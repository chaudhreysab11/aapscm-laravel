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
            // Commerce Data Alignment - Task A: 3 confirmed products + public prices.
            // See database/docs/wp-commerce-mapping.md.
            CommerceConfirmedProductsSeeder::class,
            CommerceConfirmedPricesSeeder::class,
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
            // Architect directive (2026-04-20): board_members is the single
            // source of truth for the public /board-of-directors/ render and
            // the Filament admin list. Must run AFTER the page seeder.
            BoardMembersSeeder::class,
            CertificationsForProfessionalsPageSeeder::class,
            AllCoursesPageSeeder::class,
            AapscmTrainingPageSeeder::class,
            OnlineExamPageSeeder::class,
            OnlineCoursesPageSeeder::class,
            ProcurementManagementPageSeeder::class,
            ApplicationFormProcurementPageSeeder::class,
            SupplyChainManagementPageSeeder::class,
            MembershipPageSeeder::class,
            ProfessionalMembershipPageSeeder::class,
            CharteredProfessionalMembershipPageSeeder::class,
            CorporateMembershipPageSeeder::class,
            StudentMembershipPageSeeder::class,
            ProfessionalMembershipRenewalPageSeeder::class,
            FellowMembershipPageSeeder::class,
            MembershipFaqsPageSeeder::class,
            GrandFellowMembershipPageSeeder::class,
            SpecialistFellowMembershipPageSeeder::class,
            ProfessionalFellowMembershipPageSeeder::class,
            AcademicFellowMembershipPageSeeder::class,
            CorporateFellowMembershipPageSeeder::class,
            EmergingLeaderFellowMembershipPageSeeder::class,
            InternationalFellowMembershipPageSeeder::class,
            FellowMembershipFormPageSeeder::class,
            // Certification detail pages (WP parity) — must run BEFORE HomePageSeeder
            // so the home cert-card grid links resolve to existing pages.
            CertAcppPageSeeder::class,
            CertAmericanCertifiedProcurementManagerAcpmPageSeeder::class,
            CertTheAmericanCertifiedSupplyChainProfessionalAcscpPageSeeder::class,
            CertCharteredSupplyChainManagerAcscmPageSeeder::class,
            CertTheAmericanCertifiedSupplyChainArtificialIntelligenceAnalystAcsaiPageSeeder::class,
            CertAmericanCertifiedDigitalProcurementAnalyticsSpecialistPageSeeder::class,
            CertAmericanCertifiedSustainableProcurementEthicalSourcingProfessionalPageSeeder::class,
            CertAmericanCertifiedProcurementRiskManagementSpecialistPageSeeder::class,
            CertAmericanCertifiedStrategicProcurementSupplierRelationshipSpecialistPageSeeder::class,
            CertCharteredStrategicProcurementSupplierRelationshipSpecialistPageSeeder::class,
            CertAmericanCertifiedItProcurementDigitalTransformationSpecialistPageSeeder::class,
            CertAmericanCertifiedPublicSectorProcurementComplianceSpecialistPageSeeder::class,
            CertAmericanCertifiedGlobalProcurementCrossBorderSupplySpecialistAcGpcssPageSeeder::class,
            CertAmericanCertifiedProcurementDataScienceAiSpecialistAcPdssPageSeeder::class,
            CertAmericanCertifiedProcurementLeadershipChangeManagementSpecialistPageSeeder::class,
            CertAmericanCertifiedProcurementAutomationRpaSpecialistAcParas2PageSeeder::class,
            CertAmericanCertifiedTourismProfessionalPageSeeder::class,
            CertAcsctPageSeeder::class,
            CertCharteredHealthcareProcurementSolutionsProfessionalChppPageSeeder::class,
            CertAmericanCertifiedSupplyChainCybersecurityProfessionalAcSccpPageSeeder::class,
            CertCharteredAdvancedSupplyChainCybersecurityManagerCaSccmPageSeeder::class,
            CertCharteredAiDrivenSustainableProcurementManagerCaIspmPageSeeder::class,
            CertAmericanCertifiedBlockchainForSupplyChainProfessionalAcBscpPageSeeder::class,
            CertCharteredSustainableSupplyChainManagerCsscmPageSeeder::class,
            CertAmericanCertifiedDigitalSupplyChainIntegrationProfessionalAcDscipPageSeeder::class,
            CertAmericanCertifiedGlobalSupplyChainRiskAndResilienceProfessionalacGsrpPageSeeder::class,
            CertCharteredSustainableCulinaryTourismManagerCsctmPageSeeder::class,
            CertAmericanCertifiedECommerceStrategyAndGrowthProfessionalAcEsgpPageSeeder::class,
            CertAmericanCertifiedEthicalPracticesSustainableECommerceProfessionalAcSeepPageSeeder::class,
            CertAmericanCertifiedDigitalMerchandisingAndUserExperienceProfessionalAcDmuxPageSeeder::class,
            HomePageSeeder::class,
            WpRedirectsSeeder::class,
        ]);
    }
}
