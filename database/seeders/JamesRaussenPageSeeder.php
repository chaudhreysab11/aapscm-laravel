<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class JamesRaussenPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'james-raussen';
    }

    protected function payloadFile(): string
    {
        return 'james-raussen_data.php';
    }
}