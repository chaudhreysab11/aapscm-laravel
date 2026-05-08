<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertAmericanCertifiedSustainableProcurementAmpGreenSupplyChainProfessionalAcSpgscpPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'american-certified-sustainable-procurement-amp-green-supply-chain-professional-ac-spgscp';
    }

    protected function payloadFile(): string
    {
        return 'american-certified-sustainable-procurement-amp-green-supply-chain-professional-ac-spgscp_data.php';
    }
}
