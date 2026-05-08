<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertCertifiedDigitalTourismExperienceProfessionalCdtepPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'certified-digital-tourism-experience-professional-cdtep';
    }

    protected function payloadFile(): string
    {
        return 'certified-digital-tourism-experience-professional-cdtep_data.php';
    }
}
