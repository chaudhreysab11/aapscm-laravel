<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualCertifiedAiRpaProcurementManagerCairpmPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-certified-ai-rpa-procurement-manager-cairpm';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-certified-ai-rpa-procurement-manager-cairpm_data.php';
    }
}
