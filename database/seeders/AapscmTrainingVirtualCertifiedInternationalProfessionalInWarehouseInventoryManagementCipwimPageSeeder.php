<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualCertifiedInternationalProfessionalInWarehouseInventoryManagementCipwimPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-certified-international-professional-in-warehouse-inventory-management-cipwim';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-certified-international-professional-in-warehouse-inventory-management-cipwim_data.php';
    }
}
