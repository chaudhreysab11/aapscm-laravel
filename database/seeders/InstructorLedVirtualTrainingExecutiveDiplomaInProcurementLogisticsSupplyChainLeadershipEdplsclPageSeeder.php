<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class InstructorLedVirtualTrainingExecutiveDiplomaInProcurementLogisticsSupplyChainLeadershipEdplsclPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'instructor-led-virtual-training-executive-diploma-in-procurement-logistics-supply-chain-leadership-edplscl';
    }

    protected function payloadFile(): string
    {
        return 'instructor-led-virtual-training-executive-diploma-in-procurement-logistics-supply-chain-leadership-edplscl_data.php';
    }
}
