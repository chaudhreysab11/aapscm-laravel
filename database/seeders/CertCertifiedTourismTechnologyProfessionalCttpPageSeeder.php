<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertCertifiedTourismTechnologyProfessionalCttpPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'certified-tourism-technology-professional-cttp';
    }

    protected function payloadFile(): string
    {
        return 'certified-tourism-technology-professional-cttp_data.php';
    }
}
