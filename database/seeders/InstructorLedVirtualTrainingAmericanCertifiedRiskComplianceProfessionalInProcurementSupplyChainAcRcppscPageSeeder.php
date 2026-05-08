<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class InstructorLedVirtualTrainingAmericanCertifiedRiskComplianceProfessionalInProcurementSupplyChainAcRcppscPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'instructor-led-virtual-training-american-certified-risk-compliance-professional-in-procurement-supply-chain-ac-rcppsc';
    }

    protected function payloadFile(): string
    {
        return 'instructor-led-virtual-training-american-certified-risk-compliance-professional-in-procurement-supply-chain-ac-rcppsc_data.php';
    }
}
