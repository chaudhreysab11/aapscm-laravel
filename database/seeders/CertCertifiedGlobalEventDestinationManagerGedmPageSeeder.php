<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertCertifiedGlobalEventDestinationManagerGedmPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'certified-global-event-destination-manager-gedm';
    }

    protected function payloadFile(): string
    {
        return 'certified-global-event-destination-manager-gedm_data.php';
    }
}
