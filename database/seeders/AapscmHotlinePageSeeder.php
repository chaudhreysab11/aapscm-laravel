<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AapscmHotlinePageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'aapscm-hotline';
    }

    protected function payloadFile(): string
    {
        return 'aapscm-hotline_data.php';
    }
}
