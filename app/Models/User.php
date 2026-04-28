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
}
