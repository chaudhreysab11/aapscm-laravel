<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            MembershipTiersSeeder::class,
            RedirectsSeeder::class,
            WpCmsPagesImportSeeder::class,
            AboutUsPageSeeder::class,
            ContactUsPageSeeder::class,
            UsChartersPageSeeder::class,
            BoardProfilesSeeder::class,
            DonationsPageSeeder::class,
            AapscmHotlinePageSeeder::class,
            TrademarkPageSeeder::class,
            PrivacyPolicyPageSeeder::class,
            BecomePartnerPageSeeder::class,
            HowToApplyPageSeeder::class,
            CertificationsFaqPageSeeder::class,
            WhichCertificationPageSeeder::class,
            RequestPdesPageSeeder::class,
            ProfessionalMemberCriteriaPageSeeder::class,
            WhyJoinAapscmPageSeeder::class,
            BenefitsAndResourcesPageSeeder::class,
            DigitalBadgesPageSeeder::class,
            TrainingAndCredentialingPageSeeder::class,
            TrainingSchoolAffiliatedPageSeeder::class,
            BecomeAuthorizedTrainingPartnerPageSeeder::class,
            AffiliatePartnersPageSeeder::class,
            MemberServicesPageSeeder::class,
            ProfessionalDevelopmentPageSeeder::class,
            NonProfitActivitiesDonationPageSeeder::class,
            InfluencingSuppliersPageSeeder::class,
            BoardOfDirectorsPageSeeder::class,
            HomePageSeeder::class,
            WpRedirectsSeeder::class,
        ]);
    }
}
