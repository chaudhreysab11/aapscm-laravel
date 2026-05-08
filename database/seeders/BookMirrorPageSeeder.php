<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class BookMirrorPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'book';
    }

    protected function payloadFile(): string
    {
        return 'book_data.php';
    }
}