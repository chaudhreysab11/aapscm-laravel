<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertCharteredAiDrivenSustainableProcurementManagerCaiSpmPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'chartered-ai-driven-sustainable-procurement-manager-cai-spm';
    }

    protected function payloadFile(): string
    {
        return 'chartered-ai-driven-sustainable-procurement-manager-cai-spm_data.php';
    }
}
