<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertAdvancedCertifiedProcurementLogisticsSupplyChainManagerAcPlscmPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'advanced-certified-procurement-logistics-supply-chain-manager-ac-plscm';
    }

    protected function payloadFile(): string
    {
        return 'advanced-certified-procurement-logistics-supply-chain-manager-ac-plscm_data.php';
    }
}
