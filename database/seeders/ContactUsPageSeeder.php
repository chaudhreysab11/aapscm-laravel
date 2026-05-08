<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class ContactUsPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'contact-us';
    }

    protected function payloadFile(): string
    {
        return 'contact-us_data.php';
    }
}