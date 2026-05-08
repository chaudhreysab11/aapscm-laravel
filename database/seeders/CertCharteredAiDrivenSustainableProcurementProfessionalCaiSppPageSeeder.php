<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertCharteredAiDrivenSustainableProcurementProfessionalCaiSppPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'chartered-ai-driven-sustainable-procurement-professional-cai-spp';
    }

    protected function payloadFile(): string
    {
        return 'chartered-ai-driven-sustainable-procurement-professional-cai-spp_data.php';
    }
}
