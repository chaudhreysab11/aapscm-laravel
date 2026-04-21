<?php

declare(strict_types=1);

use App\Models\Page;
use App\Models\Product;
use Database\Seeders\CommerceConfirmedPricesSeeder;
use Database\Seeders\CommerceConfirmedProductsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

/**
 * Boot the 3 confirmed products + the matching CMS Page rows the controller
 * needs in order to render. Each Page row is the minimum needed to satisfy
 * CmsPageController::__invoke and the page_data shape used by its Blade view.
 *
 * @param  array<string, mixed>  $pageData
 */
function makeCommercePage(string $slug, string $title, array $pageData): Page
{
    return Page::create([
        'slug' => $slug,
        'title' => $title,
        'template' => '',
        'status' => 'published',
        'is_published' => true,
        'content' => '',
        'page_data' => $pageData,
    ]);
}

beforeEach(function (): void {
    (new CommerceConfirmedProductsSeeder)->run();
    (new CommerceConfirmedPricesSeeder)->run();
});

it('renders the Join Now add-to-cart button on the Professional Membership page', function (): void {
    $product = Product::where('slug', 'professional-membership')->firstOrFail();

    makeCommercePage('professional-membership', 'Professional Membership', [
        'how_to_become' => [
            'heading_html' => 'How to Become a Professional Member',
            'steps' => [],
            'button_text' => 'Join Now',
            'button_url' => '/checkout/?add-to-cart=4234',
        ],
    ]);

    $response = $this->get('/professional-membership/');

    $response->assertOk()
        ->assertSee('action="' . route('cart.add', $product->id) . '"', false)
        ->assertSee('Join Now');
});

it('renders the Join Now add-to-cart button inside the fee block on the Corporate Membership page', function (): void {
    $product = Product::where('slug', 'corporate-membership')->firstOrFail();

    makeCommercePage('corporate-membership', 'Corporate Membership', [
        'hero' => [
            'heading' => 'Corporate Membership',
            'button_text' => 'Join Today',
            'button_url' => '#application-fm',
        ],
        'fee' => [
            'heading' => 'Annual Corporate Membership Fee: $3,000 USD',
            'subtitle' => 'This yearly membership fee includes:',
            'includes' => ['A', 'B'],
        ],
    ]);

    $response = $this->get('/corporate-membership/');

    $response->assertOk()
        // Hero anchor is preserved for the WP-aligned scroll-to-form behaviour.
        ->assertSee('href="#application-fm"', false)
        ->assertSee('Join Today')
        // Add-to-cart button lives inside the fee block.
        ->assertSee('action="'.route('cart.add', $product->id).'"', false)
        ->assertSee('Join Now');
});

it('renders both Renew add-to-cart buttons on the Professional Membership Renewal page', function (): void {
    $product = Product::where('slug', 'professional-membership-renewal')->firstOrFail();

    makeCommercePage('professional-membership-renewal', 'Professional Membership Renewal', [
        'hero' => [
            'heading_html' => '<strong>Renewal</strong>',
            'fee_html' => '<strong>Annual Membership Renewal Fee: $160</strong>',
            'button_text' => 'Renew Membership Now',
            'button_url' => '/checkout/?add-to-cart=37207',
        ],
        'form' => [
            'heading' => 'Membership Renewal Form',
            'checkout_url' => '/checkout/?add-to-cart=37207',
            'checkout_text' => 'Renew Your Membership',
            'fee_text' => 'Annual Membership Fee: $160',
            'sections' => [
                ['title' => 'MEMBERSHIP RENEWAL PAYMENT', 'fields' => []],
            ],
        ],
    ]);

    $response = $this->get('/professional-membership-renewal/');

    $action = 'action="' . route('cart.add', $product->id) . '"';

    $response->assertOk()
        ->assertSee('Renew Membership Now')
        ->assertSee('Renew Your Membership');

    // Both CTAs must POST to cart.add for this product.
    expect(substr_count($response->getContent(), $action))->toBe(2);
});

it('falls back to the legacy anchor when the mapped product is missing', function (): void {
    Product::where('slug', 'professional-membership')->delete();

    makeCommercePage('professional-membership', 'Professional Membership', [
        'how_to_become' => [
            'steps' => [],
            'button_text' => 'Join Now',
            'button_url' => '/checkout/?add-to-cart=4234',
        ],
    ]);

    $response = $this->get('/professional-membership/');

    $response->assertOk()
        ->assertSee('href="/checkout/?add-to-cart=4234"', false)
        ->assertDontSee('action="' . route('cart.add', 0) . '"', false);
});
