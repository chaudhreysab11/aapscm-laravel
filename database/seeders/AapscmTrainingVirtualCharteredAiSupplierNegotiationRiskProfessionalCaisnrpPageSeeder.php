<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualCharteredAiSupplierNegotiationRiskProfessionalCaisnrpPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-chartered-ai-supplier-negotiation-risk-professional-caisnrp';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-chartered-ai-supplier-negotiation-risk-professional-caisnrp_data.php';
    }
}
