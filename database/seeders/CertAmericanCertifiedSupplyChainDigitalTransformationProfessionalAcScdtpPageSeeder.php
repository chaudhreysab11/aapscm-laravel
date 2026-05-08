<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertAmericanCertifiedSupplyChainDigitalTransformationProfessionalAcScdtpPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'american-certified-supply-chain-digital-transformation-professional-ac-scdtp';
    }

    protected function payloadFile(): string
    {
        return 'american-certified-supply-chain-digital-transformation-professional-ac-scdtp_data.php';
    }
}
