<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualCertifiedInternationalProfessionalInProcurementMaterialsManagementCippmPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-certified-international-professional-in-procurement-materials-management-cippm';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-certified-international-professional-in-procurement-materials-management-cippm_data.php';
    }
}
