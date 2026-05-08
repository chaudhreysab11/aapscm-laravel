<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualCertifiedSustainableHospitalityInnovatorCshiPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-certified-sustainable-hospitality-innovator-cshi';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-certified-sustainable-hospitality-innovator-cshi_data.php';
    }
}
