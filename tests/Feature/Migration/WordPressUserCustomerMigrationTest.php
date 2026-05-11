<?php

declare(strict_types=1);

use App\Models\MigrationFlag;
use App\Models\User;
use App\Support\Migration\WordPressUserCustomerImporter;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function writeWordPressUserCustomerMigrationCsv(string $path, array $headers, array $rows): void
{
    $handle = fopen($path, 'w');

    if ($handle === false) {
        throw new RuntimeException("Unable to write test CSV at {$path}");
    }

    fputcsv($handle, $headers);

    foreach ($rows as $row) {
        fputcsv($handle, array_map(fn (string $header): string => (string) ($row[$header] ?? ''), $headers));
    }

    fclose($handle);
}

function makeWordPressUserCustomerMigrationFixtures(array $rows): array
{
    $directory = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'aapscm-user-customer-migration-' . uniqid('', true);
    mkdir($directory, 0777, true);

    $usersPath = $directory . DIRECTORY_SEPARATOR . 'users-customer.csv';
    $guestMapPath = $directory . DIRECTORY_SEPARATOR . 'wp-guest-customers-map.csv';

    writeWordPressUserCustomerMigrationCsv($usersPath, [
        'ID',
        'customer_id',
        'user_login',
        'user_pass',
        'user_nicename',
        'user_email',
        'user_url',
        'user_registered',
        'display_name',
        'first_name',
        'last_name',
        'user_status',
        'roles',
        'nickname',
        'description',
        'is_guest_user',
        'orders',
        'billing_first_name',
        'billing_last_name',
        'billing_company',
        'billing_email',
        'billing_phone',
        'billing_address_1',
        'billing_address_2',
        'billing_postcode',
        'billing_city',
        'billing_state',
        'billing_country',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_company',
        'shipping_phone',
        'shipping_address_1',
        'shipping_address_2',
        'shipping_postcode',
        'shipping_city',
        'shipping_state',
        'shipping_country',
        'wc_last_active',
        'total_spent',
        'aov',
    ], $rows);

    return [$usersPath, $guestMapPath];
}

it('imports registered users idempotently and preserves WordPress source id', function (): void {
    [$usersPath, $guestMapPath] = makeWordPressUserCustomerMigrationFixtures([
        [
            'ID' => '7781',
            'customer_id' => '7781',
            'user_login' => 'aaaboalola',
            'user_email' => 'AAABOALOLA@GMAIL.COM',
            'display_name' => 'aaaboalola',
            'first_name' => 'Abdulrahman',
            'last_name' => 'Aboalola',
            'roles' => 'customer',
            'is_guest_user' => '0',
            'billing_email' => 'aaaboalola@gmail.com',
            'billing_phone' => '+966543100720',
            'billing_company' => 'AAPSCM Test',
            'billing_country' => 'SA',
        ],
    ]);

    $importer = app(WordPressUserCustomerImporter::class);
    $firstRun = $importer->import($usersPath, $guestMapPath, clearExistingFlags: true);
    $secondRun = $importer->import($usersPath, $guestMapPath, clearExistingFlags: true);
    $user = User::where('source_id', 7781)->firstOrFail();

    expect($firstRun['registered_created'])->toBe(1)
        ->and($secondRun['registered_updated'])->toBe(1)
        ->and(User::where('source_id', 7781)->count())->toBe(1)
        ->and($user->email)->toBe('aaaboalola@gmail.com')
        ->and($user->phone)->toBe('+966543100720')
        ->and($user->company)->toBe('AAPSCM Test')
        ->and($user->profile_payload['migration']['password_reset_required'])->toBeTrue()
        ->and($user->profile_payload['migration']['wordpress_password_reused'])->toBeFalse()
        ->and($user->hasRole('subscriber'))->toBeTrue();
});

it('preserves guest customer rows without creating Laravel login accounts', function (): void {
    [$usersPath, $guestMapPath] = makeWordPressUserCustomerMigrationFixtures([
        [
            'user_email' => 'guest@example.com',
            'roles' => 'customer',
            'is_guest_user' => '1',
            'billing_email' => 'guest@example.com',
            'billing_first_name' => 'Guest',
            'billing_last_name' => 'Buyer',
            'billing_phone' => '123456789',
            'billing_address_1' => '123 Test Street',
            'billing_city' => 'Testville',
            'billing_country' => 'US',
        ],
    ]);

    $result = app(WordPressUserCustomerImporter::class)->import($usersPath, $guestMapPath, clearExistingFlags: true);
    $guestRows = array_map('str_getcsv', file($guestMapPath) ?: []);
    $headers = array_shift($guestRows);
    $guest = array_combine($headers ?: [], $guestRows[0] ?? []);

    expect($result['guest_rows_preserved'])->toBe(1)
        ->and(User::where('email', 'guest@example.com')->exists())->toBeFalse()
        ->and($guest['billing_email'])->toBe('guest@example.com')
        ->and($guest['billing_phone'])->toBe('123456789')
        ->and($guest['billing_address_1'])->toBe('123 Test Street')
        ->and($guest['source_note'])->toBe('guest customer preserved without Laravel login account');
});

it('flags unsupported WordPress roles and invalid registered emails', function (): void {
    [$usersPath, $guestMapPath] = makeWordPressUserCustomerMigrationFixtures([
        [
            'ID' => '1',
            'customer_id' => '1',
            'user_login' => 'admin',
            'user_email' => 'admin@example.com',
            'display_name' => 'Admin',
            'roles' => 'administrator, bbp_keymaster, tutor_instructor',
            'is_guest_user' => '0',
        ],
        [
            'ID' => '2',
            'customer_id' => '2',
            'user_login' => 'bademail',
            'user_email' => 'not-an-email',
            'display_name' => 'Bad Email',
            'roles' => 'customer',
            'is_guest_user' => '0',
        ],
    ]);

    $result = app(WordPressUserCustomerImporter::class)->import($usersPath, $guestMapPath, clearExistingFlags: true);

    expect($result['registered_created'])->toBe(1)
        ->and($result['registered_skipped'])->toBe(1)
        ->and($result['unsupported_role_flags'])->toBe(2)
        ->and($result['invalid_email_rows'])->toBe(1)
        ->and(User::where('email', 'not-an-email')->exists())->toBeFalse()
        ->and(User::where('email', 'admin@example.com')->firstOrFail()->hasRole('admin'))->toBeTrue()
        ->and(MigrationFlag::where('importer', 'WpImportUsersCustomers')->where('flag_reason', 'like', 'unsupported_wordpress_role:%')->count())->toBe(2)
        ->and(MigrationFlag::where('importer', 'WpImportUsersCustomers')->where('flag_reason', 'like', 'invalid_registered_email:%')->count())->toBe(1);
});
