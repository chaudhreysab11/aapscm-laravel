<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualCharteredAiDrivenSustainableProcurementProfessionalCaiSppPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-chartered-ai-driven-sustainable-procurement-professional-cai-spp';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-chartered-ai-driven-sustainable-procurement-professional-cai-spp_data.php';
    }
}
