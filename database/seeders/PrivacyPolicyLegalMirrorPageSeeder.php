<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class PrivacyPolicyLegalMirrorPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'privacy-policy-legal';
    }

    protected function payloadFile(): string
    {
        return 'privacy-policy-legal_data.php';
    }
}