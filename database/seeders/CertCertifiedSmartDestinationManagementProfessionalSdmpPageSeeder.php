<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertCertifiedSmartDestinationManagementProfessionalSdmpPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'certified-smart-destination-management-professional-sdmp';
    }

    protected function payloadFile(): string
    {
        return 'certified-smart-destination-management-professional-sdmp_data.php';
    }
}
