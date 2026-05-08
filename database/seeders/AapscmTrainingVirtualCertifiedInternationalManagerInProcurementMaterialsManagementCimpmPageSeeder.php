<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualCertifiedInternationalManagerInProcurementMaterialsManagementCimpmPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-certified-international-manager-in-procurement-materials-management-cimpm';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-certified-international-manager-in-procurement-materials-management-cimpm_data.php';
    }
}
