<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property UserMembership|null $currentMembership
 */
class User extends Authenticatable implements FilamentUser, MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, HasRoles, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'password_initialized_at',
        'phone',
        'job_title',
        'company',
        'country',
        'avatar',
        'is_active',
        'source_id',
        'profile_payload',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'password_initialized_at' => 'datetime',
            'is_active' => 'boolean',
            'profile_payload' => 'array',
        ];
    }

    // ─── Relationships ──────────────────────────────────────────────────────────

    public function memberships(): HasMany
    {
        return $this->hasMany(UserMembership::class);
    }

    public function currentMembership(): HasOne
    {
        return $this->hasOne(UserMembership::class)
            ->where('status', 'active')
            ->latest('starts_at');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function courseEnrollments(): HasMany
    {
        return $this->hasMany(CourseEnrollment::class);
    }

    public function certificationsAwarded(): HasMany
    {
        return $this->hasMany(CertificationAwarded::class);
    }

    public function examBookings(): HasMany
    {
        return $this->hasMany(ExamBooking::class);
    }

    // ─── Accessors / Helpers ────────────────────────────────────────────────────

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasRole(['admin', 'staff']);
    }

    public function hasActiveMembership(): bool
    {
        return $this->currentMembership()->exists();
    }

    public function activeMembershipTier(): ?MembershipTier
    {
        return $this->currentMembership?->tier;
    }

    public function requiresPasswordSetup(): bool
    {
        if ($this->password_initialized_at !== null) {
            return false;
        }

        return data_get($this->profile_payload, 'migration.password_reset_required') === true
            || data_get($this->profile_payload, 'auth.password_setup_required') === true;
    }

    public function hasInitializedPassword(): bool
    {
        return ! $this->requiresPasswordSetup();
    }

    public function hasVerifiedEmail(): bool
    {
        return true;
    }

    public function sendEmailVerificationNotification(): void
    {
        // Temporarily disabled until outbound email is configured.
    }
}
