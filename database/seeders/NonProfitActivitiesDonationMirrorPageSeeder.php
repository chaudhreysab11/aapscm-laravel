<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class NonProfitActivitiesDonationMirrorPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'non-profit-activities-donation';
    }

    protected function payloadFile(): string
    {
        return 'non-profit-activities-donation_data.php';
    }
}