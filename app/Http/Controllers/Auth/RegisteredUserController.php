<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    private const LEGACY_INDUSTRIES = [
        'Advertising/Marketing',
        'Communication',
        'Construction',
        'Education',
        'Engineering/Research',
        'Finance/Banking/Insurance',
        'Food Service',
        'Government',
        'Hospital/Health Services',
        'Lodging/Entertainment',
        'Manufacturing',
        'Publishing',
        'Religious Affiliation',
        'Retail',
        'Services',
        'Transportation',
        'Utilities',
        'Wholesale/Distribution',
        'None',
        'Other',
    ];

    private const LEGACY_TITLE_CODES = [
        'Analyst',
        'Asst. Purchasing Agent',
        'Buyer',
        'Buyer/Planner',
        'Coordinator',
        'Expediter',
        'Logistics',
        'Materials Director',
        'Materials Manager',
        'Purchasing',
        'Purchasing Agent',
        'Purchasing Director',
        'Purchasing Manager',
        'Purchasing Supervisor',
        'Specialist',
        'Supply Chain',
        'V.P., Materials',
        'V.P., Purchasing',
        'None',
        'Other',
    ];

    private const LEGACY_SECURITY_QUESTIONS = [
        'What city was your mother born in?',
        'What city were you born in?',
        'What hospital were you born in?',
        'What is your Mother\'s Maiden Name?',
        'What was the model of your first car?',
        'What was the name of the first school you attended?',
        'What was the name of your favorite teacher?',
        'What was the name of your first employer?',
        'What was your first pet\'s name?',
    ];

    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        return view('auth.register', [
            'redirectTo' => $this->resolveRedirectTarget($request->string('redirect_to')->toString()),
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $isLegacyRegistration = $request->hasAny([
            'user_email',
            'user_login',
            'industry',
            'company_division',
            'title_code',
            'address_line_1',
            'security_question',
        ]);

        $request->merge([
            'email' => $request->input('email', $request->input('user_email')),
            'password' => $request->input('password', $request->input('user_pass')),
            'password_confirmation' => $request->input('password_confirmation', $request->input('user_confirm_password')),
            'job_title' => $request->input('job_title', $request->input('title')),
            'phone' => $request->input('phone', $request->input('phone_number')),
        ]);

        $validated = $request->validate([
            'name' => ['nullable', 'string', 'max:255', 'required_without_all:first_name,last_name'],
            'first_name' => ['nullable', 'string', 'max:100', 'required_without:name'],
            'last_name' => ['nullable', 'string', 'max:100', 'required_without:name'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone' => [$isLegacyRegistration ? 'required' : 'nullable', 'string', 'max:50'],
            'job_title' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:100'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'redirect_to' => ['nullable', 'string'],
            'industry' => [$isLegacyRegistration ? 'required' : 'nullable', Rule::in(self::LEGACY_INDUSTRIES)],
            'company_division' => ['nullable', 'string', 'max:255'],
            'title_code' => ['nullable', Rule::in(self::LEGACY_TITLE_CODES)],
            'address_line_1' => [$isLegacyRegistration ? 'required' : 'nullable', 'string', 'max:255'],
            'address_line_2' => ['nullable', 'string', 'max:255'],
            'fax_number' => ['nullable', 'string', 'max:50'],
            'user_login' => [$isLegacyRegistration ? 'required' : 'nullable', 'string', 'max:100'],
            'security_question' => ['nullable', Rule::in(self::LEGACY_SECURITY_QUESTIONS)],
            'security_answer' => ['nullable', 'string', 'max:255'],
        ]);

        $name = trim((string) ($validated['name'] ?? ''));
        if ($name === '') {
            $name = trim(((string) ($validated['first_name'] ?? '')) . ' ' . ((string) ($validated['last_name'] ?? '')));
        }

        $user = User::create([
            'name' => $name,
            'email' => $validated['email'],
            'email_verified_at' => now(),
            'phone' => $validated['phone'] ?? null,
            'job_title' => $validated['job_title'] ?? null,
            'company' => $validated['company'] ?? ($request->input('company') ?: null),
            'country' => $validated['country'] ?? null,
            'password' => Hash::make($validated['password']),
            'password_initialized_at' => now(),
            'profile_payload' => $this->buildProfilePayload($request, $isLegacyRegistration),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $redirectTarget = $this->resolveRedirectTarget((string) ($validated['redirect_to'] ?? ''));

        return $redirectTarget !== null
            ? redirect()->to($redirectTarget)
            : redirect(route('dashboard', absolute: false));
    }

    private function resolveRedirectTarget(string $target): ?string
    {
        if ($target === '' || ! str_starts_with($target, '/')) {
            return null;
        }

        return $target;
    }

    private function buildProfilePayload(Request $request, bool $isLegacyRegistration): ?array
    {
        if (! $isLegacyRegistration) {
            return null;
        }

        return array_filter([
            'industry' => $request->string('industry')->toString(),
            'company_division' => $request->string('company_division')->toString(),
            'title_code' => $request->string('title_code')->toString(),
            'address_line_1' => $request->string('address_line_1')->toString(),
            'address_line_2' => $request->string('address_line_2')->toString(),
            'fax_number' => $request->string('fax_number')->toString(),
            'username' => $request->string('user_login')->toString(),
            'security_question' => $request->string('security_question')->toString(),
            'security_answer' => $request->string('security_answer')->toString(),
            'registration_context' => 'post-resume',
        ], static fn ($value): bool => $value !== '');
    }
}
