<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualCertifiedDigitalTourismExperienceManagerCdtemPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-certified-digital-tourism-experience-manager-cdtem';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-certified-digital-tourism-experience-manager-cdtem_data.php';
    }
}
