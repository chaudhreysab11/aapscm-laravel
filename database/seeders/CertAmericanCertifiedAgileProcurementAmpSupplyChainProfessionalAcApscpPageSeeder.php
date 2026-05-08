<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertAmericanCertifiedAgileProcurementAmpSupplyChainProfessionalAcApscpPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'american-certified-agile-procurement-amp-supply-chain-professional-ac-apscp';
    }

    protected function payloadFile(): string
    {
        return 'american-certified-agile-procurement-amp-supply-chain-professional-ac-apscp_data.php';
    }
}
