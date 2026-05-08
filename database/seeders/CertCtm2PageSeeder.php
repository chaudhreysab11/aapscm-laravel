<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertCtm2PageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'ctm-2';
    }

    protected function payloadFile(): string
    {
        return 'ctm-2_data.php';
    }
}
