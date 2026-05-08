<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class InstructorLedVirtualTrainingAmericanCertifiedGlobalProcurementLogisticsSupplyChainProfessionalAcGplscpPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'instructor-led-virtual-training-american-certified-global-procurement-logistics-supply-chain-professional-ac-gplscp';
    }

    protected function payloadFile(): string
    {
        return 'instructor-led-virtual-training-american-certified-global-procurement-logistics-supply-chain-professional-ac-gplscp_data.php';
    }
}
