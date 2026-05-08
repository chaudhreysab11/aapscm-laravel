<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualAmericanCertifiedGlobalSupplyChainRiskAndResilienceManagerAcGsrmPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-american-certified-global-supply-chain-risk-and-resilience-manager-ac-gsrm';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-american-certified-global-supply-chain-risk-and-resilience-manager-ac-gsrm_data.php';
    }
}
