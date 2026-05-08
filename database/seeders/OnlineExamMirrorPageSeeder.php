<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class OnlineExamMirrorPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'online-exam';
    }

    protected function payloadFile(): string
    {
        return 'online-exam_data.php';
    }
}