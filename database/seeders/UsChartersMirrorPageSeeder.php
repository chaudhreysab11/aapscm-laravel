<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class UsChartersMirrorPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'us-charters';
    }

    protected function payloadFile(): string
    {
        return 'us-charters_data.php';
    }
}