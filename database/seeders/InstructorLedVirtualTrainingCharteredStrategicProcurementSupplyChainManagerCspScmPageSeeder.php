<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class InstructorLedVirtualTrainingCharteredStrategicProcurementSupplyChainManagerCspScmPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'instructor-led-virtual-training-chartered-strategic-procurement-supply-chain-manager-csp-scm';
    }

    protected function payloadFile(): string
    {
        return 'instructor-led-virtual-training-chartered-strategic-procurement-supply-chain-manager-csp-scm_data.php';
    }
}
