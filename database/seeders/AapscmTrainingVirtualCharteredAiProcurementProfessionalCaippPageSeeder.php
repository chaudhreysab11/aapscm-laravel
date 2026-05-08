<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualCharteredAiProcurementProfessionalCaippPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-chartered-ai-procurement-professional-caipp';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-chartered-ai-procurement-professional-caipp_data.php';
    }
}
