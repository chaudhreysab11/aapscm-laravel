<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class CertCertifiedAiEnabledTravelPersonalizationDigitalMarketingManagerAitpDmmPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'certified-ai-enabled-travel-personalization-digital-marketing-manager-aitp-dmm';
    }

    protected function payloadFile(): string
    {
        return 'certified-ai-enabled-travel-personalization-digital-marketing-manager-aitp-dmm_data.php';
    }
}
