<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class ApscmTrainingVirtualCharteredHealthcareProcurementSolutionsManagerChpmPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'apscm-training-virtual-chartered-healthcare-procurement-solutions-manager-chpm';
    }

    protected function payloadFile(): string
    {
        return 'apscm-training-virtual-chartered-healthcare-procurement-solutions-manager-chpm_data.php';
    }
}
