<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class InstructorLedVirtualTrainingAmericanCertifiedDigitalSupplyChainProcurementTransformationProfessionalAcDscptpPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'instructor-led-virtual-training-american-certified-digital-supply-chain-procurement-transformation-professional-ac-dscptp';
    }

    protected function payloadFile(): string
    {
        return 'instructor-led-virtual-training-american-certified-digital-supply-chain-procurement-transformation-professional-ac-dscptp_data.php';
    }
}
