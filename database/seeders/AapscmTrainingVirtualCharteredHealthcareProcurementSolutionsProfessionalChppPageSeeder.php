<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualCharteredHealthcareProcurementSolutionsProfessionalChppPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-chartered-healthcare-procurement-solutions-professional-chpp';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-chartered-healthcare-procurement-solutions-professional-chpp_data.php';
    }
}
