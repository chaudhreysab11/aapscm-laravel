<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CommunitiesMirrorPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'communities';
    }

    protected function payloadFile(): string
    {
        return 'communities_data.php';
    }
}