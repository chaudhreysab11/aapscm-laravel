<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AboutUsPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'about-us';
    }

    protected function payloadFile(): string
    {
        return 'about-us_data.php';
    }
}