<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    private const LOGIN_EMAIL_PATH = '/login/email';

    private const PASSWORD_REQUEST_PATH = '/forgot-password';

    private const PASSWORD_SETUP_PATH = '/set-password';

    private const DIRECT_SETUP_PASSWORD = 'Password!123';

    public function test_reset_password_link_screen_can_be_rendered(): void
    {
        $response = $this->get(self::PASSWORD_REQUEST_PATH);

        $response->assertStatus(200)
            ->assertSee('Forgot Password')
            ->assertSee('Account Recovery');
    }

    public function test_first_login_password_setup_screen_can_be_rendered(): void
    {
        $user = User::factory()->passwordSetupRequired()->create();

        $this->post(self::LOGIN_EMAIL_PATH, [
            'email' => $user->email,
        ])->assertRedirect(route('password.setup', absolute: false));

        $response = $this->get(self::PASSWORD_SETUP_PATH);

        $response->assertStatus(200)
            ->assertSee('Set Your Password')
            ->assertSee($user->email);
    }

    public function test_reset_password_link_can_be_requested(): void
    {
        Notification::fake();

        $user = User::factory()->create();

        $this->post(self::PASSWORD_REQUEST_PATH, ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class);
    }

    public function test_reset_password_screen_can_be_rendered(): void
    {
        Notification::fake();

        $user = User::factory()->create();

        $this->post(self::PASSWORD_REQUEST_PATH, ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class, function ($notification) use ($user) {
            $response = $this->get('/reset-password/' . $notification->token . '?email=' . urlencode($user->email));

            $response->assertStatus(200)
                ->assertSee('Reset Password')
                ->assertSee('Account Recovery');

            return true;
        });
    }

    public function test_password_can_be_reset_with_valid_token(): void
    {
        $user = User::factory()->passwordSetupRequired()->create();

        $this->post(self::LOGIN_EMAIL_PATH, [
            'email' => $user->email,
        ])->assertRedirect(route('password.setup', absolute: false));

        $this->get(self::PASSWORD_SETUP_PATH)->assertOk();

        $response = $this->post(self::PASSWORD_SETUP_PATH, [
            'password' => self::DIRECT_SETUP_PASSWORD,
            'password_confirmation' => self::DIRECT_SETUP_PASSWORD,
        ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('login.password', ['email' => $user->email], false));

        $this->assertNotNull($user->fresh()->password_initialized_at);
        $this->assertFalse((bool) data_get($user->fresh()->profile_payload, 'auth.password_setup_required'));
    }

    public function test_first_login_setup_requires_an_active_session_transition(): void
    {
        $response = $this->get(self::PASSWORD_SETUP_PATH);

        $response->assertStatus(302)
            ->assertSessionHasErrors('email');
    }

    public function test_users_can_log_in_normally_after_setting_their_password(): void
    {
        $user = User::factory()->passwordSetupRequired()->create();

        $this->post(self::LOGIN_EMAIL_PATH, [
            'email' => $user->email,
        ])->assertRedirect(route('password.setup', absolute: false));

        $this->get(self::PASSWORD_SETUP_PATH)->assertOk();

        $this->post(self::PASSWORD_SETUP_PATH, [
            'password' => self::DIRECT_SETUP_PASSWORD,
            'password_confirmation' => self::DIRECT_SETUP_PASSWORD,
        ])->assertRedirect(route('login.password', ['email' => $user->email], false));

        $this->post(self::LOGIN_EMAIL_PATH, [
            'email' => $user->email,
        ])->assertRedirect(route('login.password', ['email' => $user->email], false));

        $this->post('/login', [
            'email' => $user->email,
            'password' => self::DIRECT_SETUP_PASSWORD,
        ])->assertRedirect(route('dashboard', absolute: false));

        $this->assertAuthenticatedAs($user);
    }
}
