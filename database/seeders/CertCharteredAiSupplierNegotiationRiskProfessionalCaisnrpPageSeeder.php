<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertCharteredAiSupplierNegotiationRiskProfessionalCaisnrpPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'chartered-ai-supplier-negotiation-risk-professional-caisnrp';
    }

    protected function payloadFile(): string
    {
        return 'chartered-ai-supplier-negotiation-risk-professional-caisnrp_data.php';
    }
}
