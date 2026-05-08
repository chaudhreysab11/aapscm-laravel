<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class InfluencingSuppliersMirrorPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'influencing-suppliers';
    }

    protected function payloadFile(): string
    {
        return 'influencing-suppliers_data.php';
    }
}