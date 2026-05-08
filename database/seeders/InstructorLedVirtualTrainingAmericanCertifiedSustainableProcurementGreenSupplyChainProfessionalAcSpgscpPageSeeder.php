<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class InstructorLedVirtualTrainingAmericanCertifiedSustainableProcurementGreenSupplyChainProfessionalAcSpgscpPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'instructor-led-virtual-training-american-certified-sustainable-procurement-green-supply-chain-professional-ac-spgscp';
    }

    protected function payloadFile(): string
    {
        return 'instructor-led-virtual-training-american-certified-sustainable-procurement-green-supply-chain-professional-ac-spgscp_data.php';
    }
}
