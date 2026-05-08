<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class MohamedAboelelaPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'mohamed-aboelela';
    }

    protected function payloadFile(): string
    {
        return 'mohamed-aboelela_data.php';
    }
}