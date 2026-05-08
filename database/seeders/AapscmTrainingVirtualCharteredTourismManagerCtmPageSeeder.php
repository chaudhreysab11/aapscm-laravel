<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualCharteredTourismManagerCtmPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-chartered-tourism-manager-ctm';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-chartered-tourism-manager-ctm_data.php';
    }
}
