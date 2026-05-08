<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(Request $request): View
    {
        $redirectTo = $this->rememberRedirectTarget($request, $request->string('redirect_to')->toString());

        return view('auth.forgot-password', [
            'email' => old('email', $request->string('email')->toString()),
            'firstLogin' => $request->boolean('first_login'),
            'redirectTo' => $redirectTo,
        ]);
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'redirect_to' => ['nullable', 'string'],
            'first_login' => ['nullable', 'boolean'],
        ]);

        $redirectTo = $this->rememberRedirectTarget($request, (string) $request->input('redirect_to', ''));

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status == Password::RESET_LINK_SENT) {
            if ($request->boolean('first_login')) {
                return redirect()->route('password.request', array_filter([
                    'email' => $request->string('email')->toString(),
                    'first_login' => 1,
                    'redirect_to' => $redirectTo,
                ]))->with('status', 'We sent a password setup link to your email address.');
            }

            return back()->with('status', __($status));
        }

        return back()->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
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
}
