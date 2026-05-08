<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class InstructorLedVirtualTrainingAmericanCertifiedProcurementLogisticsTransportationExpertAcPltePageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'instructor-led-virtual-training-american-certified-procurement-logistics-transportation-expert-ac-plte';
    }

    protected function payloadFile(): string
    {
        return 'instructor-led-virtual-training-american-certified-procurement-logistics-transportation-expert-ac-plte_data.php';
    }
}
