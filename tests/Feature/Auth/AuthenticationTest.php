<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    private const LOGIN_PATH = '/login';

    private const LOGIN_EMAIL_PATH = '/login/email';

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get(self::LOGIN_PATH);

        $response->assertStatus(200)
            ->assertSee('Member Login')
            ->assertSee('AAPSCM')
            ->assertSee('Continue')
            ->assertDontSee('Keep me signed in');
    }

    public function test_existing_users_are_sent_to_the_password_step_after_email_lookup(): void
    {
        $user = User::factory()->create();

        $response = $this->post(self::LOGIN_EMAIL_PATH, [
            'email' => $user->email,
        ]);

        $response->assertRedirect(route('login.password', ['email' => $user->email], false));
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create();

        $this->post(self::LOGIN_EMAIL_PATH, [
            'email' => $user->email,
        ])->assertRedirect(route('login.password', ['email' => $user->email], false));

        $response = $this->post(self::LOGIN_PATH, [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_users_return_to_my_account_with_trailing_slash_after_login(): void
    {
        $user = User::factory()->create();

        $this->get('/my-account/')
            ->assertRedirect(self::LOGIN_PATH);

        $this->post(self::LOGIN_EMAIL_PATH, [
            'email' => $user->email,
        ])->assertRedirect(route('login.password', ['email' => $user->email], false));

        $response = $this->post(self::LOGIN_PATH, [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/my-account/');
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $this->post(self::LOGIN_EMAIL_PATH, [
            'email' => $user->email,
        ])->assertRedirect(route('login.password', ['email' => $user->email], false));

        $this->from(route('login.password', ['email' => $user->email], false))->post(self::LOGIN_PATH, [
            'email' => $user->email,
            'password' => 'wrong-password',
        ])->assertSessionHasErrors('password');

        $this->assertGuest();
    }

    public function test_users_without_initialized_password_are_sent_to_password_setup(): void
    {
        $user = User::factory()->passwordSetupRequired()->create();

        $response = $this->post(self::LOGIN_EMAIL_PATH, [
            'email' => $user->email,
        ]);

        $response->assertRedirect(route('password.setup', absolute: false));
        $this->assertSame($user->email, session('auth.first_login_setup.email'));
    }

    public function test_migrated_users_without_initialized_password_are_sent_to_password_setup(): void
    {
        $user = User::factory()->passwordSetupRequired()->create([
            'source_id' => 7781,
            'profile_payload' => [
                'migration' => [
                    'password_reset_required' => true,
                    'wordpress_password_reused' => false,
                ],
            ],
        ]);

        $response = $this->post(self::LOGIN_EMAIL_PATH, [
            'email' => $user->email,
        ]);

        $response->assertRedirect(route('password.setup', absolute: false));
        $this->assertSame($user->email, session('auth.first_login_setup.email'));
    }

    public function test_accounts_with_missing_timestamp_but_no_setup_flag_still_go_to_password_entry(): void
    {
        $user = User::factory()->create([
            'password_initialized_at' => null,
            'profile_payload' => null,
        ]);

        $this->post(self::LOGIN_EMAIL_PATH, [
            'email' => $user->email,
        ])->assertRedirect(route('login.password', ['email' => $user->email], false));
    }

    public function test_unknown_emails_cannot_progress_past_the_email_step(): void
    {
        $this->from(self::LOGIN_PATH)->post(self::LOGIN_EMAIL_PATH, [
            'email' => 'unknown@example.com',
        ])->assertRedirect(self::LOGIN_PATH)
            ->assertSessionHasErrors('login_email');

        $this->assertGuest();
    }

    public function test_lookup_errors_do_not_follow_users_to_the_password_step(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@example.com',
        ]);

        $this->followingRedirects()->from(self::LOGIN_PATH)->post(self::LOGIN_EMAIL_PATH, [
            'email' => 'unknown@example.com',
        ])->assertSee('Email address is not recognized. Please check and try again.');

        $this->followingRedirects()->post(self::LOGIN_EMAIL_PATH, [
            'email' => $user->email,
        ])->assertSee('Enter your password to continue')
            ->assertSee($user->email)
            ->assertDontSee('Email address is not recognized. Please check and try again.');
    }

    public function test_users_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }
}
