<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualCertifiedSmartDestinationManagementProfessionalSdmpPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-certified-smart-destination-management-professional-sdmp';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-certified-smart-destination-management-professional-sdmp_data.php';
    }
}
