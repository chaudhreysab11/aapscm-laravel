<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertAmericanCertifiedGlobalProcurementLogisticsAmpSupplyChainProfessionalAcGplscpPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'american-certified-global-procurement-logistics-amp-supply-chain-professional-ac-gplscp';
    }

    protected function payloadFile(): string
    {
        return 'american-certified-global-procurement-logistics-amp-supply-chain-professional-ac-gplscp_data.php';
    }
}
