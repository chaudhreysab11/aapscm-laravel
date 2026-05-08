<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    private const FIRST_LOGIN_SETUP_SESSION_KEY = 'auth.first_login_setup';

    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        $user = User::query()
            ->whereRaw('LOWER(email) = ?', [Str::lower($request->string('email')->toString())])
            ->first();

        return view('auth.reset-password', [
            'request' => $request,
            'isFirstLogin' => $user instanceof User && $user->requiresPasswordSetup(),
            'isDirectSetup' => false,
            'email' => old('email', $request->string('email')->toString()),
            'formAction' => route('password.store'),
            'redirectTo' => $this->resolveRedirectTarget((string) $request->session()->get('auth.login_redirect_to', '')),
        ]);
    }

    public function createFirstLogin(Request $request): View|RedirectResponse
    {
        $setup = $this->resolveFirstLoginSetup($request);

        if (! is_array($setup)) {
            return $this->redirectToLoginStart($request, 'Please enter your email to continue.');
        }

        return view('auth.reset-password', [
            'request' => $request,
            'isFirstLogin' => true,
            'isDirectSetup' => true,
            'email' => $setup['email'],
            'formAction' => route('password.setup.store'),
            'redirectTo' => $this->resolveRedirectTarget((string) $request->session()->get('auth.login_redirect_to', '')),
        ]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'redirect_to' => ['nullable', 'string'],
        ]);

        $redirectTarget = $this->rememberRedirectTarget($request, (string) $request->input('redirect_to', ''));
        $resetUser = null;

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user) use ($request, &$resetUser) {
                $profilePayload = $user->profile_payload ?? [];

                data_set($profilePayload, 'auth.password_setup_required', false);

                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'password_initialized_at' => now(),
                    'remember_token' => Str::random(60),
                    'profile_payload' => $profilePayload,
                ])->save();

                $resetUser = $user;

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login.password', array_filter([
                'email' => $resetUser?->email ?? $request->string('email')->toString(),
                'redirect_to' => $redirectTarget,
            ]))->with('status', 'Your password has been set. Sign in to continue.');
        }

        return back()->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }

    /**
     * @throws ValidationException
     */
    public function storeFirstLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'redirect_to' => ['nullable', 'string'],
        ]);

        $setup = $this->resolveFirstLoginSetup($request);

        if (! is_array($setup)) {
            return $this->redirectToLoginStart($request, 'Your password setup session has expired. Please enter your email again.');
        }

        $redirectTarget = $this->rememberRedirectTarget($request, (string) $request->input('redirect_to', ''));
        $resetUser = null;
        $status = Password::reset(
            [
                'email' => $setup['email'],
                'password' => (string) $request->input('password'),
                'password_confirmation' => (string) $request->input('password_confirmation'),
                'token' => $setup['token'],
            ],
            function (User $user) use ($request, &$resetUser) {
                $this->applyPasswordReset($user, (string) $request->input('password'));

                $resetUser = $user;
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            $request->session()->forget(self::FIRST_LOGIN_SETUP_SESSION_KEY);

            return redirect()->route('login.password', array_filter([
                'email' => $resetUser?->email ?? $setup['email'],
                'redirect_to' => $redirectTarget,
            ]))->with('status', 'Your password has been set. Sign in to continue.');
        }

        $request->session()->forget(self::FIRST_LOGIN_SETUP_SESSION_KEY);

        return $this->redirectToLoginStart($request, 'Your password setup session has expired. Please enter your email again.');
    }

    private function resolveRedirectTarget(string $target): ?string
    {
        if ($target === '' || ! str_starts_with($target, '/')) {
            return null;
        }

        return $target;
    }

    private function rememberRedirectTarget(Request $request, string $target = ''): ?string
    {
        $resolvedTarget = $this->resolveRedirectTarget($target);

        if ($resolvedTarget !== null) {
            $request->session()->put('auth.login_redirect_to', $resolvedTarget);

            return $resolvedTarget;
        }

        return $this->resolveRedirectTarget((string) $request->session()->get('auth.login_redirect_to', ''));
    }

    private function redirectToLoginStart(Request $request, string $message): RedirectResponse
    {
        return redirect()->route('login', array_filter([
            'redirect_to' => $this->resolveRedirectTarget((string) $request->session()->get('auth.login_redirect_to', '')),
        ]))->withErrors([
            'email' => $message,
        ]);
    }

    /**
     * @return array{email:string, token:string, expires_at:int}|null
     */
    private function resolveFirstLoginSetup(Request $request): ?array
    {
        $setup = $request->session()->get(self::FIRST_LOGIN_SETUP_SESSION_KEY);
        $resolvedSetup = null;

        if (is_array($setup)) {
            $email = Str::lower(trim((string) ($setup['email'] ?? '')));
            $token = (string) ($setup['token'] ?? '');
            $expiresAt = (int) ($setup['expires_at'] ?? 0);
            $user = null;

            if ($email !== '' && $token !== '' && $expiresAt >= now()->timestamp) {
                $user = User::query()->whereRaw('LOWER(email) = ?', [$email])->first();
            }

            if ($user instanceof User && $user->requiresPasswordSetup()) {
                $resolvedSetup = [
                    'email' => $user->email,
                    'token' => $token,
                    'expires_at' => $expiresAt,
                ];
            }
        }

        if ($resolvedSetup === null) {
            $request->session()->forget(self::FIRST_LOGIN_SETUP_SESSION_KEY);
        }

        return $resolvedSetup;
    }

    private function applyPasswordReset(User $user, string $password): void
    {
        $profilePayload = $user->profile_payload ?? [];

        data_set($profilePayload, 'auth.password_setup_required', false);

        $user->forceFill([
            'password' => Hash::make($password),
            'password_initialized_at' => now(),
            'remember_token' => Str::random(60),
            'profile_payload' => $profilePayload,
        ])->save();

        event(new PasswordReset($user));
    }
}
