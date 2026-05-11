<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use App\Models\SeoMeta;
use Database\Seeders\Support\ExactMirrorPageSeeder;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Support\Str;

class MohammedZulJamalPageSeeder extends ExactMirrorPageSeeder
{
    private const SOURCE_ID = 102895;

    public function run(): void
    {
        parent::run();

        $page = Page::where('slug', $this->slug())->firstOrFail();
        $canonical = UrlRewriter::canonical($this->slug());
        $seoDescription = Str::limit((string) ($page->seo_description ?? ''), 250, '');

        $page->forceFill([
            'source_id' => self::SOURCE_ID,
            'seo_canonical' => $canonical,
        ])->save();

        SeoMeta::updateOrCreate(
            ['url_path' => '/' . $this->slug() . '/'],
            [
                'seo_title' => $page->seo_title ?? $page->title,
                'seo_description' => $seoDescription,
                'canonical_url' => $canonical,
                'og_title' => $page->seo_title ?? $page->title,
                'og_description' => $seoDescription,
                'og_image' => '/storage/cms-images/2026/04/WhatsApp-Image-2026-04-16-at-22.13.01.jpeg',
                'robots' => 'index, follow',
                'seoable_id' => $page->id,
                'seoable_type' => Page::class,
                'source_id' => self::SOURCE_ID,
            ],
        );
    }

    protected function slug(): string
    {
        return 'mohammed-zul-jamal';
    }

    protected function payloadFile(): string
    {
        return 'mohammed-zul-jamal_data.php';
    }
}