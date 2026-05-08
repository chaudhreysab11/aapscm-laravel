<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertAmericanCertifiedDigitalSupplyChainAmpProcurementTransformationProfessionalAcDscptpPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'american-certified-digital-supply-chain-amp-procurement-transformation-professional-ac-dscptp';
    }

    protected function payloadFile(): string
    {
        return 'american-certified-digital-supply-chain-amp-procurement-transformation-professional-ac-dscptp_data.php';
    }
}
