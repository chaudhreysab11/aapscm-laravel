<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertCharteredSupplyChainArtificialIntelligenceAnalystPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'chartered-supply-chain-artificial-intelligence-analyst';
    }

    protected function payloadFile(): string
    {
        return 'chartered-supply-chain-artificial-intelligence-analyst_data.php';
    }
}
