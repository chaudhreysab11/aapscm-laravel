<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class BoardOfDirectorsPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'board-of-directors';
    }

    protected function payloadFile(): string
    {
        return 'board-of-directors_data.php';
    }
}
