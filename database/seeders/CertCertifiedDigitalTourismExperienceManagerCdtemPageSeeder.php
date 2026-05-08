<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertCertifiedDigitalTourismExperienceManagerCdtemPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'certified-digital-tourism-experience-manager-cdtem';
    }

    protected function payloadFile(): string
    {
        return 'certified-digital-tourism-experience-manager-cdtem_data.php';
    }
}
