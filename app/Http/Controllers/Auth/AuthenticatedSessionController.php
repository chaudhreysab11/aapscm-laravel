<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StartLoginRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(Request $request): View
    {
        $redirectTo = $this->rememberRedirectTarget($request, $request->string('redirect_to')->toString());

        return view('auth.login', [
            'step' => 'email',
            'email' => old('email'),
            'redirectTo' => $redirectTo,
        ]);
    }

    public function identify(StartLoginRequest $request): RedirectResponse
    {
        $request->ensureIsNotRateLimited();

        $redirectTarget = $this->rememberRedirectTarget($request, $request->string('redirect_to')->toString());
        $user = $this->findUserByEmail($request->string('email')->toString());
        $response = back()
            ->withInput($request->only('email'))
            ->withErrors(['login_email' => 'Email address is not recognized. Please check and try again.']);

        if (! $user instanceof User) {
            $request->hitRateLimiter();

            return $response;
        }

        $request->clearRateLimiter();

        if ($user->requiresPasswordSetup()) {
            $this->rememberPasswordSetupState($request, $user);

            $response = redirect()->route('password.setup', array_filter([
                'redirect_to' => $redirectTarget,
            ]))->with('status', 'Set your password to continue with your account.');
        } else {
            $request->session()->forget('auth.first_login_setup');

            $response = redirect()->route('login.password', array_filter([
                'email' => $user->email,
                'redirect_to' => $redirectTarget,
            ]));
        }

        return $response;
    }

    public function password(Request $request): View|RedirectResponse
    {
        $redirectTarget = $this->rememberRedirectTarget($request, $request->string('redirect_to')->toString());
        $email = trim($request->string('email')->toString());
        $user = $this->findUserByEmail($email);

        if (! $user instanceof User || $user->requiresPasswordSetup()) {
            return redirect()->route('login', array_filter([
                'redirect_to' => $redirectTarget,
            ]))->withErrors([
                'email' => 'Please enter your email to continue.',
            ]);
        }

        return view('auth.login', [
            'step' => 'password',
            'email' => $user->email,
            'redirectTo' => $redirectTarget,
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $redirectTarget = $this->consumeRedirectTarget($request, $request->string('redirect_to')->toString());

        if ($redirectTarget !== null) {
            return redirect()->to($redirectTarget);
        }

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
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

    private function consumeRedirectTarget(Request $request, string $target = ''): ?string
    {
        $resolvedTarget = $this->resolveRedirectTarget($target);

        if ($resolvedTarget !== null) {
            $request->session()->forget('auth.login_redirect_to');

            return $resolvedTarget;
        }

        return $this->resolveRedirectTarget((string) $request->session()->pull('auth.login_redirect_to', ''));
    }

    private function findUserByEmail(string $email): ?User
    {
        $normalized = strtolower(trim($email));

        if ($normalized === '') {
            return null;
        }

        return User::query()
            ->whereRaw('LOWER(email) = ?', [$normalized])
            ->first();
    }

    private function rememberPasswordSetupState(Request $request, User $user): void
    {
        $request->session()->put('auth.first_login_setup', [
            'email' => $user->email,
            'token' => Password::broker()->createToken($user),
            'expires_at' => now()->addMinutes(15)->timestamp,
        ]);
    }
}
