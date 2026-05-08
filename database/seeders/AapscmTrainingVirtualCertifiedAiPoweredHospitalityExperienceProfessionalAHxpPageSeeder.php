<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualCertifiedAiPoweredHospitalityExperienceProfessionalAHxpPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-certified-ai-powered-hospitality-experience-professional-a-hxp';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-certified-ai-powered-hospitality-experience-professional-a-hxp_data.php';
    }
}
