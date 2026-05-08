<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class InstructorLedVirtualTrainingAmericanCertifiedAgileProcurementSupplyChainProfessionalAcApscpPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'instructor-led-virtual-training-american-certified-agile-procurement-supply-chain-professional-ac-apscp';
    }

    protected function payloadFile(): string
    {
        return 'instructor-led-virtual-training-american-certified-agile-procurement-supply-chain-professional-ac-apscp_data.php';
    }
}
