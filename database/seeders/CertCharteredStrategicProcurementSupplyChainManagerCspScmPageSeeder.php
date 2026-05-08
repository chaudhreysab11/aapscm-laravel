<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertCharteredStrategicProcurementSupplyChainManagerCspScmPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'chartered-strategic-procurement-supply-chain-manager-csp-scm';
    }

    protected function payloadFile(): string
    {
        return 'chartered-strategic-procurement-supply-chain-manager-csp-scm_data.php';
    }
}
