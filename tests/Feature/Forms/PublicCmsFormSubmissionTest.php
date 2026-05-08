<?php

declare(strict_types=1);

use App\Models\ContactInquiry;
use App\Models\CorporateMembershipApplication;
use App\Models\HotlineReport;
use App\Models\HowToApplySubmission;
use App\Models\PdesCertificateRequest;
use App\Models\Page;
use App\Models\PartnerInquiry;
use App\Models\ProfessionalMembershipRenewal;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

it('persists a contact inquiry from the mirrored contact form', function (): void {
    $this->from('/contact-us/')
        ->post('/contact-us/', [
            'text-600' => 'Contact Tester',
            'email-775' => 'contact@example.com',
            'your-subject' => 'Need information',
            'your-message' => 'Please share more details about certification timelines.',
        ])
        ->assertRedirect('/contact-us/')
        ->assertSessionHas('success');

    $inquiry = ContactInquiry::query()->where('email', 'contact@example.com')->first();

    expect($inquiry)->not->toBeNull()
        ->and($inquiry?->subject)->toBe('Need information')
        ->and($inquiry?->message)->toContain('certification timelines');
});

it('persists a how-to-apply submission with an uploaded CV', function (): void {
    Storage::fake('public');

    $this->from('/how-to-apply/')
        ->post('/how-to-apply/', [
            'text-782' => 'Apply Tester',
            'email-543' => 'apply@example.com',
            'tel-26' => '+1-202-555-0175',
            'UploadCV' => UploadedFile::fake()->create('cv.pdf', 200, 'application/pdf'),
            'textarea-276' => 'I want to apply for available openings.',
        ])
        ->assertRedirect('/how-to-apply/')
        ->assertSessionHas('success');

    $submission = HowToApplySubmission::query()->where('email', 'apply@example.com')->first();

    expect($submission)->not->toBeNull()
        ->and($submission?->message)->toContain('available openings');

    Storage::disk('public')->assertExists($submission?->cv_path ?? '');
});

it('persists a hotline report and provisions a linked user account', function (): void {
    $this->from('/aapscm-hotline/')
        ->post('/aapscm-hotline/', [
            'radio_1634974481' => 'No',
            'first_name' => 'Hotline',
            'last_name' => 'Tester',
            'user_email' => 'hotline@example.com',
            'number_box_1634974669' => '+1-202-555-0148',
            'date_box_1634974714' => '1994-06-12',
            'user_pass' => 'secret-pass-123',
            'textarea_1634974759' => 'Incident summary for the hotline validation test.',
            'textarea_1634974811' => '123 Ethics Avenue, Accra',
            'check_box_1634974900' => [
                'By using this form you agree with the storage and handling of your data by this website.',
            ],
        ])
        ->assertRedirect('/aapscm-hotline/')
        ->assertSessionHas('success');

    $user = User::query()->where('email', 'hotline@example.com')->first();
    $report = HotlineReport::query()->where('email', 'hotline@example.com')->first();

    expect($user)->not->toBeNull()
        ->and($report)->not->toBeNull()
        ->and($report?->user_id)->toBe($user?->id)
        ->and($report?->terms_accepted)->toBeTrue();
});

it('persists a corporate membership application', function (): void {
    $this->from('/corporate-membership/')
        ->post('/corporate-membership/', [
            'text-726' => 'Example Manufacturing Group',
            'text-565' => 'Example Manufacturing Group LLC',
            'number-586' => 'REG-556677',
            'date-484' => '2018-01-01',
            'checkbox-122' => ['Manufacturing', 'Construction'],
            'number-475' => 85,
            'text-174' => 'https://example.org',
            'text-81' => '45 Industrial Estate',
            'text-834' => 'Ghana',
            'text-25' => '4',
        ])
        ->assertRedirect('/corporate-membership/')
        ->assertSessionHas('success');

    $application = CorporateMembershipApplication::query()
        ->where('organization_name', 'Example Manufacturing Group')
        ->first();

    expect($application)->not->toBeNull()
        ->and($application?->industry_sectors)->toBe(['Manufacturing', 'Construction'])
        ->and($application?->employee_count)->toBe(85);
});

it('persists a professional membership renewal and redirects card payments into checkout', function (): void {
    $product = Product::factory()->create([
        'name' => 'Professional Membership Renewal',
        'slug' => 'professional-membership-renewal',
        'source_id' => 445566,
        'is_active' => true,
    ]);

    ProductPrice::factory()->create([
        'product_id' => $product->id,
        'membership_tier_id' => null,
        'price' => 249,
        'currency' => 'USD',
        'is_active' => true,
    ]);

    $this->from('/professional-membership-renewal/')
        ->post('/professional-membership-renewal/', [
            'text-195' => 'Renewal Tester',
            'text-825' => 'AAPSCM-445566',
            'email-655' => 'renewal@example.com',
            'tel-101' => '+1-202-555-0188',
            'text-384' => 'United States',
            'text-944' => 'Procurement Manager',
            'text-585' => 'Renewal Co',
            'radio-592' => 'Procurement & Supply Chain',
            'radio-346' => 'Credit/Debit Card',
            'text-839' => '789 Billing Street',
            'text-992' => 'Atlanta',
            'text-883' => 'Georgia',
            'text-776' => '30303',
            'acceptance-46' => '1',
        ])
        ->assertRedirect(route('checkout.show', ['add-to-cart' => 445566]))
        ->assertSessionHas('success');

    $renewal = ProfessionalMembershipRenewal::query()->where('membership_id', 'AAPSCM-445566')->first();

    expect($renewal)->not->toBeNull()
        ->and($renewal?->payment_method)->toBe('Credit/Debit Card')
        ->and($renewal?->terms_accepted)->toBeTrue();
});

it('persists a public partner inquiry and provisions a linked user account', function (): void {
    $this->from('/become-a-partner/')
        ->post('/become-a-partner/', [
            'user_login' => 'partner.user',
            'first_name' => 'Ada',
            'last_name' => 'Lovelace',
            'user_email' => 'partner@example.com',
            'user_pass' => 'secure-pass-123',
            'role' => 'Director',
            'city' => 'Accra',
            'country' => 'GH',
            'organization' => 'Partner Org',
            'partner_type' => 'Academic Partner',
            'assist' => 'We want to discuss accreditation and delivery support.',
        ])
        ->assertRedirect('/become-a-partner/')
        ->assertSessionHas('success');

    $user = User::query()->where('email', 'partner@example.com')->first();

    expect($user)->not->toBeNull()
        ->and($user?->company)->toBe('Partner Org');

    $inquiry = PartnerInquiry::query()->where('email', 'partner@example.com')->first();

    expect($inquiry)->not->toBeNull()
        ->and($inquiry?->user_id)->toBe($user?->id)
        ->and($inquiry?->account_created)->toBeTrue()
        ->and($inquiry?->partner_type)->toBe('Academic Partner');
});

it('persists a PDES certificate request with uploaded documents', function (): void {
    Storage::fake('public');

    Page::factory()->create([
        'slug' => 'request-pdes-for-certificate',
        'title' => 'Request PDES for Certificate',
        'is_published' => true,
        'page_data' => [
            'form' => [
                'declarations' => [
                    'I confirm the information provided is accurate.',
                    'I agree to the review process.',
                ],
            ],
        ],
    ]);

    $this->from('/request-pdes-for-certificate/')
        ->post('/request-pdes-for-certificate/', [
            'full_name' => 'Grace Hopper',
            'email' => 'grace@example.com',
            'phone' => '+1-202-555-0100',
            'certification' => 'American Certified Procurement Professional',
            'certification_number' => 'AAPSCM-12345',
            'activity_type' => 'Conference',
            'course_name' => 'Advanced Procurement Summit',
            'provider' => 'AAPSCM Training',
            'location' => 'Virtual',
            'course_date' => '2026-04-30',
            'pdes_earned' => 12,
            'category' => 'Professional Development',
            'certificate' => UploadedFile::fake()->create('certificate.pdf', 300, 'application/pdf'),
            'additional_docs' => UploadedFile::fake()->create('agenda.pdf', 200, 'application/pdf'),
            'declaration_0' => '1',
            'declaration_1' => '1',
        ])
        ->assertRedirect('/request-pdes-for-certificate/')
        ->assertSessionHas('success');

    $request = PdesCertificateRequest::query()->where('email', 'grace@example.com')->first();

    expect($request)->not->toBeNull()
        ->and($request?->pdes_earned)->toBe(12)
        ->and($request?->declarations)->toBe(['declaration_0', 'declaration_1']);

    Storage::disk('public')->assertExists($request?->certificate_path ?? '');
    Storage::disk('public')->assertExists($request?->additional_documents_path ?? '');
});

it('rewrites mirrored WooCommerce cart forms to the Laravel cart route and preserves the selected option', function (): void {
    $product = Product::factory()->create([
        'name' => 'Mirror Training Product',
        'source_id' => 19726,
        'is_active' => true,
    ]);

    ProductPrice::factory()->create([
        'product_id' => $product->id,
        'membership_tier_id' => null,
        'price' => 1200,
        'currency' => 'USD',
        'is_active' => true,
    ]);

    Page::factory()->create([
        'slug' => 'aapscm-hotline',
        'title' => 'AAPSCM Hotline',
        'is_published' => true,
        'page_data' => [
            'root' => [
                'tag' => 'div',
                'class' => 'elementor',
                'data_elementor_type' => 'wp-page',
                'data_elementor_id' => '3934',
            ],
            'body_html' => <<<'HTML'
<div class="woocommerce">
    <form class="cart" action="https://aapscm.org/product/example-product/" method="post" enctype="multipart/form-data">
        <div class="custom_variation">
            <select name="custom_options" id="custom_options">
                <option value="">Choose an option</option>
                <option value="FEB 7-11, 2026" selected>FEB 7-11, 2026</option>
            </select>
        </div>
        <button type="submit" name="add-to-cart" value="19726" class="single_add_to_cart_button button alt">Schedule Training</button>
    </form>
</div>
HTML,
        ],
    ]);

    $response = $this->get('/aapscm-hotline/');

    $response
        ->assertStatus(200)
        ->assertSee(route('cart.add', ['product' => '19726']), false)
        ->assertSee('name="redirect_to"', false);

    $this->post(route('cart.add', ['product' => '19726']), [
        'custom_options' => 'FEB 7-11, 2026',
        'redirect_to' => route('cart.show'),
    ])->assertRedirect(route('cart.show'));

    expect(session('cart.items.' . $product->id . '.meta.selected_option'))->toBe('FEB 7-11, 2026');

    $this->get('/cart/')
        ->assertOk()
        ->assertSee('Selected option: FEB 7-11, 2026');

    $this->get('/checkout/')
        ->assertOk()
        ->assertSee('Selected option: FEB 7-11, 2026');
});
