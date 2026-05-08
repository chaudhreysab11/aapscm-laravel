<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualCharteredHealthcareSupplyChainTransformationExecutiveChstePageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-chartered-healthcare-supply-chain-transformation-executive-chste';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-chartered-healthcare-supply-chain-transformation-executive-chste_data.php';
    }
}
