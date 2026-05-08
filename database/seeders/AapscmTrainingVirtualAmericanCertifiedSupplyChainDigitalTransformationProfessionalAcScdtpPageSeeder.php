<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmTrainingVirtualAmericanCertifiedSupplyChainDigitalTransformationProfessionalAcScdtpPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-training-virtual-american-certified-supply-chain-digital-transformation-professional-ac-scdtp';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-training-virtual-american-certified-supply-chain-digital-transformation-professional-ac-scdtp_data.php';
    }
}
