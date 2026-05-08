<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertCertifiedDigitalTourismTransformationSpecialistDttsPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'certified-digital-tourism-transformation-specialist-dtts';
    }

    protected function payloadFile(): string
    {
        return 'certified-digital-tourism-transformation-specialist-dtts_data.php';
    }
}
