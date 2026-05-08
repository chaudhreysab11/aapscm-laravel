<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualCertifiedAiDrivenTourismDataAnalystAitaPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-certified-ai-driven-tourism-data-analyst-aita';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-certified-ai-driven-tourism-data-analyst-aita_data.php';
    }
}
