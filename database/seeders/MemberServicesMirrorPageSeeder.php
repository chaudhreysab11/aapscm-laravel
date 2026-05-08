<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class MemberServicesMirrorPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'member-services';
    }

    protected function payloadFile(): string
    {
        return 'member-services_data.php';
    }
}