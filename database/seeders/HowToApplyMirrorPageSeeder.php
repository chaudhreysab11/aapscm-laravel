<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class HowToApplyMirrorPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'how-to-apply';
    }

    protected function payloadFile(): string
    {
        return 'how-to-apply_data.php';
    }
}