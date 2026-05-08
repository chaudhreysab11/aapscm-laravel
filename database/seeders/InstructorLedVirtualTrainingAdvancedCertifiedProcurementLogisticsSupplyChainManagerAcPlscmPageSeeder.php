<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class InstructorLedVirtualTrainingAdvancedCertifiedProcurementLogisticsSupplyChainManagerAcPlscmPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'instructor-led-virtual-training-advanced-certified-procurement-logistics-supply-chain-manager-ac-plscm';
    }

    protected function payloadFile(): string
    {
        return 'instructor-led-virtual-training-advanced-certified-procurement-logistics-supply-chain-manager-ac-plscm_data.php';
    }
}
