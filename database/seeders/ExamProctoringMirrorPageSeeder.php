<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class ExamProctoringMirrorPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'exam-proctoring';
    }

    protected function payloadFile(): string
    {
        return 'exam-proctoring_data.php';
    }
}