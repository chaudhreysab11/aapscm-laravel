<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AboutTestingOptionsMirrorPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'about-testing-options';
    }

    protected function payloadFile(): string
    {
        return 'about-testing-options_data.php';
    }
}