<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualCertifiedGlobalEventDestinationManagerGedmPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-certified-global-event-destination-manager-gedm';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-certified-global-event-destination-manager-gedm_data.php';
    }
}
