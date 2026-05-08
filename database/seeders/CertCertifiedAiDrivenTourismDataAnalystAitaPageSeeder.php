<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertCertifiedAiDrivenTourismDataAnalystAitaPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'certified-ai-driven-tourism-data-analyst-aita';
    }

    protected function payloadFile(): string
    {
        return 'certified-ai-driven-tourism-data-analyst-aita_data.php';
    }
}
