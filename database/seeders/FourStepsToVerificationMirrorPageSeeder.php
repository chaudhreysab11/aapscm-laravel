<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class FourStepsToVerificationMirrorPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return '4-steps-to-verification';
    }

    protected function payloadFile(): string
    {
        return '4-steps-to-verification_data.php';
    }
}