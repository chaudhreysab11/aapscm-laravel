<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertAmericanCertifiedRiskAmpComplianceProfessionalInProcurementAmpSupplyChainAcRcppscPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'american-certified-risk-amp-compliance-professional-in-procurement-amp-supply-chain-ac-rcppsc';
    }

    protected function payloadFile(): string
    {
        return 'american-certified-risk-amp-compliance-professional-in-procurement-amp-supply-chain-ac-rcppsc_data.php';
    }
}
