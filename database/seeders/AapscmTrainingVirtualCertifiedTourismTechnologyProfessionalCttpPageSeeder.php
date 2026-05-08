<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualCertifiedTourismTechnologyProfessionalCttpPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-certified-tourism-technology-professional-cttp';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-certified-tourism-technology-professional-cttp_data.php';
    }
}
