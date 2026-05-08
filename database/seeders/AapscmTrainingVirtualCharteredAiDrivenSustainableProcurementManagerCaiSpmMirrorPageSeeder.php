<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualCharteredAiDrivenSustainableProcurementManagerCaiSpmMirrorPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-chartered-ai-driven-sustainable-procurement-manager-cai-spm';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-chartered-ai-driven-sustainable-procurement-manager-cai-spm_data.php';
    }
}
