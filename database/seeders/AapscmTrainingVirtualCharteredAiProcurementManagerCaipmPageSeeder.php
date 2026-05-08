<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualCharteredAiProcurementManagerCaipmPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-chartered-ai-procurement-manager-caipm';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-chartered-ai-procurement-manager-caipm_data.php';
    }
}
