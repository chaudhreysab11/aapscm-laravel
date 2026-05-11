<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class BoardOfDirectorsPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'board-of-directors';
    }

    protected function payloadFile(): string
    {
        return 'board-of-directors_data.php';
    }

    protected function transformPageData(array $pageData): array
    {
        unset($pageData['body_html'], $pageData['members']);

        $pageData['page_heading'] ??= 'Board of Directors';
        $pageData['section_heading'] ??= 'Board of Directors';

        return $pageData;
    }
}
