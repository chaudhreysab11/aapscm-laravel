<?php

declare(strict_types=1);

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('renders shared interactive fallbacks for mirrored accordion widgets', function () {
    Page::factory()->create([
        'slug' => 'membership-faqs',
        'title' => 'Membership FAQs',
        'is_published' => true,
        'template' => 'standard_content',
        'page_data' => [
            'root' => [
                'tag' => 'div',
                'class' => 'elementor',
                'data_elementor_type' => 'wp-page',
                'data_elementor_id' => '9999',
            ],
            'body_html' => <<<'HTML'
<div class="uael-faq-container uael-faq-layout-accordion" data-layout="accordion">
    <div class="uael-faq-accordion" role="tablist">
        <div class="uael-accordion-title" aria-expanded="false" role="tab">
            <span class="uael-question-span" tabindex="0">Example UAEL Question</span>
        </div>
        <div class="uael-accordion-content" role="tabpanel">Example UAEL Answer</div>
    </div>
</div>
<div class="elementor-accordion">
    <div class="elementor-tab-title" data-tab="1" role="button" aria-controls="elementor-tab-content-1" aria-expanded="false">
        <span class="elementor-accordion-title" tabindex="0">Example Elementor Question</span>
    </div>
    <div id="elementor-tab-content-1" class="elementor-tab-content" data-tab="1" role="region">Example Elementor Answer</div>
</div>
HTML,
        ],
    ]);

    $this->get('/membership-faqs/')
        ->assertStatus(200)
        ->assertViewIs('cms.page.membership-exact-mirror')
        ->assertSee('mirrorUaelAccordionReady', false)
        ->assertSee('mirrorAccordionReady', false)
        ->assertSee('.uael-faq-accordion .uael-accordion-content', false)
        ->assertSee('.elementor-accordion .elementor-tab-content', false);
});
