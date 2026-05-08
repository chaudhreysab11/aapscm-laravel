<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualCharteredSupplyChainArtificialIntelligenceCsaianalystPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-chartered-supply-chain-artificial-intelligence-csaianalyst';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-chartered-supply-chain-artificial-intelligence-csaianalyst_data.php';
    }
}
