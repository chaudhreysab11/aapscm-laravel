<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertCertifiedInternationalProfessionalInWarehouseInventoryManagementCipwimPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'certified-international-professional-in-warehouse-inventory-management-cipwim';
    }

    protected function payloadFile(): string
    {
        return 'certified-international-professional-in-warehouse-inventory-management-cipwim_data.php';
    }
}
