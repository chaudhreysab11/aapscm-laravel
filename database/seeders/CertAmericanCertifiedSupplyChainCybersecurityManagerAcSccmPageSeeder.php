<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertAmericanCertifiedSupplyChainCybersecurityManagerAcSccmPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'american-certified-supply-chain-cybersecurity-manager-ac-sccm';
    }

    protected function payloadFile(): string
    {
        return 'american-certified-supply-chain-cybersecurity-manager-ac-sccm_data.php';
    }
}
