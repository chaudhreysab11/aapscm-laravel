<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertCertifiedAiPoweredHospitalityExperienceProfessionalAHxpPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'certified-ai-powered-hospitality-experience-professional-a-hxp';
    }

    protected function payloadFile(): string
    {
        return 'certified-ai-powered-hospitality-experience-professional-a-hxp_data.php';
    }
}
