<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertificateExamPoliciesMirrorPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'certificate-exam-policies';
    }

    protected function payloadFile(): string
    {
        return 'certificate-exam-policies_data.php';
    }
}