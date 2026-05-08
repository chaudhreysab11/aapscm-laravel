<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class AffiliatePartnersPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'affiliate-partners';
    }

    protected function payloadFile(): string
    {
        return 'affiliate-partners_data.php';
    }
}
