<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertCertifiedSustainableHospitalityInnovatorCshiPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'certified-sustainable-hospitality-innovator-cshi';
    }

    protected function payloadFile(): string
    {
        return 'certified-sustainable-hospitality-innovator-cshi_data.php';
    }
}
