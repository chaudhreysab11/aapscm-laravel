<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertCertifiedAiPoweredHospitalityExperienceManagerAHxmPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'certified-ai-powered-hospitality-experience-manager-a-hxm';
    }

    protected function payloadFile(): string
    {
        return 'certified-ai-powered-hospitality-experience-manager-a-hxm_data.php';
    }
}
