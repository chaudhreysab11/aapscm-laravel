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
            BoardProfilesSeeder::class,
            JamesRaussenPageSeeder::class,
            MohamedAboelelaPageSeeder::class,
            AapscmHotlinePageSeeder::class,
            CareerCenterMirrorPagesSeeder::class,
            TrademarkPageSeeder::class,
            BecomePartnerPageSeeder::class,
            RequestPdesPageSeeder::class,
            AffiliatePartnersPageSeeder::class,
            BoardOfDirectorsPageSeeder::class,
            // Architect directive (2026-04-20): board_members is the single
            // source of truth for the public /board-of-directors/ render and
            // the Filament admin list. Must run AFTER the page seeder.
            BoardMembersSeeder::class,
            ApplicationFormProcurementPageSeeder::class,
            VerifyACertificatePageSeeder::class,
            FellowMembershipFormPageSeeder::class,
            MembershipMirrorPagesSeeder::class,
            TrainingMirrorPagesSeeder::class,
            CertificationMirrorPagesSeeder::class,
            // Instructor-led virtual training detail pages.
            InstructorLedVirtualTrainingAmericanCertifiedGlobalProcurementLogisticsSupplyChainProfessionalAcGplscpPageSeeder::class,
            InstructorLedVirtualTrainingCharteredStrategicProcurementSupplyChainManagerCspScmPageSeeder::class,
            InstructorLedVirtualTrainingAdvancedCertifiedProcurementLogisticsSupplyChainManagerAcPlscmPageSeeder::class,
            InstructorLedVirtualTrainingAmericanCertifiedSustainableProcurementGreenSupplyChainProfessionalAcSpgscpPageSeeder::class,
            InstructorLedVirtualTrainingAmericanCertifiedDigitalSupplyChainProcurementTransformationProfessionalAcDscptpPageSeeder::class,
            InstructorLedVirtualTrainingAmericanCertifiedProcurementLogisticsTransportationExpertAcPltePageSeeder::class,
            InstructorLedVirtualTrainingAmericanCertifiedAgileProcurementSupplyChainProfessionalAcApscpPageSeeder::class,
            InstructorLedVirtualTrainingAmericanCertifiedRiskComplianceProfessionalInProcurementSupplyChainAcRcppscPageSeeder::class,
            InstructorLedVirtualTrainingExecutiveDiplomaInProcurementLogisticsSupplyChainLeadershipEdplsclPageSeeder::class,
            // Training (virtual) detail pages — must run after cert detail pages,
            // before HomePageSeeder so training-card grid links resolve.
            ApscmTrainingVirtualCharteredHealthcareProcurementSolutionsManagerChpmPageSeeder::class,
            AapscmTrainingVirtualCharteredAiProcurementProfessionalCaippPageSeeder::class,
            AapscmTrainingVirtualCharteredAiProcurementManagerCaipmPageSeeder::class,
            AapscmTrainingVirtualCharteredAiSupplierNegotiationRiskProfessionalCaisnrpPageSeeder::class,
            AapscmTrainingVirtualCertifiedAiRpaProcurementManagerCairpmPageSeeder::class,
            AapscmTrainingVirtualCertifiedInternationalProfessionalInProcurementMaterialsManagementCippmPageSeeder::class,
            AapscmTrainingVirtualCertifiedInternationalManagerInProcurementMaterialsManagementCimpmPageSeeder::class,
            AapscmTrainingVirtualAmericanCertifiedSupplyChainCybersecurityManagerAcSccmPageSeeder::class,
            AapscmTrainingVirtualAmericanCertifiedSupplyChainDigitalTransformationProfessionalAcScdtpPageSeeder::class,
            AapscmTrainingVirtualAmericanCertifiedGlobalSupplyChainRiskAndResilienceManagerAcGsrmPageSeeder::class,
            AapscmTrainingVirtualCertifiedInternationalProfessionalInWarehouseInventoryManagementCipwimPageSeeder::class,
            AapscmTrainingVirtualCharteredHealthcareSupplyChainTransformationExecutiveChstePageSeeder::class,
            AapscmTrainingVirtualCertifiedAiPoweredHospitalityExperienceProfessionalAHxpPageSeeder::class,
            AapscmTrainingVirtualCertifiedAiPoweredHospitalityExperienceManagerAHxmPageSeeder::class,
            AapscmTrainingVirtualCertifiedAiEnabledTravelPersonalizationDigitalMarketingSpecialistAitpDmsPageSeeder::class,
            AapscmTrainingVirtualCertifiedAiEnabledTravelPersonalizationDigitalMarketingProfessionalAitpDmpPageSeeder::class,
            AapscmTrainingVirtualCertifiedAiEnabledTravelPersonalizationDigitalMarketingManagerAitpDmmPageSeeder::class,
            AapscmTrainingVirtualCertifiedSustainableHospitalityInnovatorCshiPageSeeder::class,
            AapscmTrainingVirtualCertifiedDigitalTourismExperienceProfessionalCdtepPageSeeder::class,
            AapscmTrainingVirtualCertifiedDigitalTourismExperienceManagerCdtemPageSeeder::class,
            AapscmTrainingVirtualCertifiedGlobalEventDestinationProfessionalGedpPageSeeder::class,
            AapscmTrainingVirtualCertifiedGlobalEventDestinationManagerGedmPageSeeder::class,
            AapscmTrainingVirtualCertifiedTourismTechnologyProfessionalCttpPageSeeder::class,
            AapscmTrainingVirtualCertifiedAiDrivenTourismDataAnalystAitaPageSeeder::class,
            AapscmTrainingVirtualCertifiedSmartDestinationManagementProfessionalSdmpPageSeeder::class,
            AapscmTrainingVirtualCertifiedDigitalTourismTransformationSpecialistDttsPageSeeder::class,
            AapscmTrainingVirtualCharteredAiDrivenSustainableProcurementProfessionalCaiSppPageSeeder::class,
            AapscmTrainingVirtualCharteredAiDrivenSustainableProcurementManagerCaiSpmMirrorPageSeeder::class,
            AapscmTrainingVirtualCharteredSupplyChainArtificialIntelligenceCsaianalystPageSeeder::class,
            AapscmTrainingVirtualCharteredTourismManagerCtmPageSeeder::class,
            // Executive Diploma program pages.
            ExecutiveDiplomaInProcurementLogisticsSupplyChainLeadershipEdplsclPageSeeder::class,
            HomePageSeeder::class,
            WpRedirectsSeeder::class,
            BookMirrorPageSeeder::class,
            CommunitiesMirrorPageSeeder::class,
            DonationsMirrorPageSeeder::class,
            HowToApplyMirrorPageSeeder::class,
            InfluencingSuppliersMirrorPageSeeder::class,
            MemberServicesMirrorPageSeeder::class,
            NonProfitActivitiesDonationMirrorPageSeeder::class,
            PrivacyPolicyLegalMirrorPageSeeder::class,
            UsChartersMirrorPageSeeder::class,
            FourStepsToVerificationMirrorPageSeeder::class,
            AboutTestingOptionsMirrorPageSeeder::class,
            CertificateExamPoliciesMirrorPageSeeder::class,
            ExamObjectivesMirrorPageSeeder::class,
            ExamProctoringMirrorPageSeeder::class,
            OnlineExamMirrorPageSeeder::class,
            ProgramsMatchMirrorPageSeeder::class,
        ]);
    }
}
