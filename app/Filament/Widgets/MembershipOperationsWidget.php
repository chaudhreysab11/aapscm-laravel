<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\CertificationAwarded;
use App\Models\CourseEnrollment;
use App\Models\UserMembership;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MembershipOperationsWidget extends StatsOverviewWidget
{
    protected static bool $isLazy = false;

    protected static ?int $sort = 2;

    protected ?string $heading = 'Membership and Access';

    protected ?string $description = 'Memberships, enrollments, and certificate activity.';

    protected function getStats(): array
    {
        $activeMemberships = UserMembership::query()->where('status', 'active')->where('expires_at', '>', now())->count();
        $expiringMemberships = UserMembership::query()
            ->where('status', 'active')
            ->whereBetween('expires_at', [now(), now()->addDays(30)])
            ->count();
        $activeEnrollments = CourseEnrollment::query()->whereIn('status', ['enrolled', 'in_progress'])->count();
        $activeCertificates = CertificationAwarded::query()->where('status', 'active')->count();

        return [
            Stat::make('Active memberships', number_format($activeMemberships))
                ->description('Currently active member access')
                ->color('success')
                ->icon('heroicon-o-identification'),
            Stat::make('Expiring in 30 days', number_format($expiringMemberships))
                ->description('Memberships nearing expiry')
                ->color($expiringMemberships > 0 ? 'warning' : 'success')
                ->icon('heroicon-o-exclamation-triangle'),
            Stat::make('Active enrollments', number_format($activeEnrollments))
                ->description('Enrolled or in-progress learners')
                ->color('info')
                ->icon('heroicon-o-academic-cap'),
            Stat::make('Active certificates', number_format($activeCertificates))
                ->description('Issued certificates still active')
                ->color('gray')
                ->icon('heroicon-o-shield-check'),
        ];
    }
}