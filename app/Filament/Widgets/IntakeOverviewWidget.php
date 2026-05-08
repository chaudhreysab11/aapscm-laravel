<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\ContactInquiry;
use App\Models\PartnerInquiry;
use App\Models\PdesCertificateRequest;
use App\Models\ProfessionalMembershipRenewal;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class IntakeOverviewWidget extends StatsOverviewWidget
{
    protected static bool $isLazy = false;

    protected static ?int $sort = 3;

    protected ?string $heading = 'Recent Intake';

    protected ?string $description = 'Recent public submissions and request volumes.';

    protected function getStats(): array
    {
        $recentSubmissions = ContactInquiry::query()->where('created_at', '>=', now()->subDays(7))->count()
            + PartnerInquiry::query()->where('created_at', '>=', now()->subDays(7))->count()
            + ProfessionalMembershipRenewal::query()->where('created_at', '>=', now()->subDays(7))->count()
            + PdesCertificateRequest::query()->where('created_at', '>=', now()->subDays(7))->count();

        $contactInquiries = ContactInquiry::query()->count();
        $partnerInquiries = PartnerInquiry::query()->count();
        $membershipRenewals = ProfessionalMembershipRenewal::query()->count();
        $certificateRequests = PdesCertificateRequest::query()->count();

        return [
            Stat::make('Recent submissions', number_format($recentSubmissions))
                ->description('Across contact, partner, renewal, and PDES forms in 7 days')
                ->color('info')
                ->icon('heroicon-o-inbox-stack'),
            Stat::make('Contact inquiries', number_format($contactInquiries))
                ->description('Total stored contact submissions')
                ->color('gray')
                ->icon('heroicon-o-chat-bubble-left-right'),
            Stat::make('Partner inquiries', number_format($partnerInquiries))
                ->description('Total partnership requests')
                ->color('gray')
                ->icon('heroicon-o-user-group'),
            Stat::make('Renewals and PDES', number_format($membershipRenewals + $certificateRequests))
                ->description('Professional renewals plus PDES certificate requests')
                ->color('warning')
                ->icon('heroicon-o-document-text'),
        ];
    }
}