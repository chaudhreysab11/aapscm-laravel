<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertCertifiedGlobalEventDestinationProfessionalGedpPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'certified-global-event-destination-professional-gedp';
    }

    protected function payloadFile(): string
    {
        return 'certified-global-event-destination-professional-gedp_data.php';
    }
}
