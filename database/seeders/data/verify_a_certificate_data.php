<?php

declare(strict_types=1);

return [
    'form' => [
        'labels' => [
            'first_name' => 'First Name:',
            'last_name' => 'Last Name:',
            'certificate_number' => 'Certificate Number:',
        ],
        'separator' => 'OR',
        'submit' => 'Verify',
    ],
    'meta' => [
        'title' => 'Verify a Certificate',
        'description' => 'Verify the authenticity of an AAPSCM® certificate by certificate number, or by first or last name.',
    ],
];
