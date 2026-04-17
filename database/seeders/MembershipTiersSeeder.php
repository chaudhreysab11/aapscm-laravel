<?php

namespace Database\Seeders;

use App\Models\MembershipTier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class MembershipTiersSeeder extends Seeder
{
    /**
     * The 13 AAPSCM membership tiers.
     * code must match the Spatie Role name used for role-based access control.
     */
    private array $tiers = [
        ['name' => 'Certified Member',               'code' => 'CM',     'annual_price' => 150.00, 'sort_order' => 1],
        ['name' => 'Senior Certified Member',        'code' => 'SCM',    'annual_price' => 200.00, 'sort_order' => 2],
        ['name' => 'Fellow Member',                  'code' => 'FM',     'annual_price' => 250.00, 'sort_order' => 3],
        ['name' => 'Student Member',                 'code' => 'STU',    'annual_price' => 50.00,  'sort_order' => 4],
        ['name' => 'Academic Member',                'code' => 'ACAD',   'annual_price' => 75.00,  'sort_order' => 5],
        ['name' => 'Corporate Member',               'code' => 'CORP',   'annual_price' => 500.00, 'sort_order' => 6],
        ['name' => 'Non-Profit Member',              'code' => 'NPO',    'annual_price' => 100.00, 'sort_order' => 7],
        ['name' => 'Government Member',              'code' => 'GOV',    'annual_price' => 100.00, 'sort_order' => 8],
        ['name' => 'International Member',           'code' => 'INTL',   'annual_price' => 125.00, 'sort_order' => 9],
        ['name' => 'Life Member',                    'code' => 'LIFE',   'annual_price' => 0.00,   'sort_order' => 10],
        ['name' => 'Honorary Member',                'code' => 'HON',    'annual_price' => 0.00,   'sort_order' => 11],
        ['name' => 'Associate Member',               'code' => 'ASSOC',  'annual_price' => 75.00,  'sort_order' => 12],
        ['name' => 'Affiliate Member',               'code' => 'AFF',    'annual_price' => 60.00,  'sort_order' => 13],
    ];

    public function run(): void
    {
        foreach ($this->tiers as $tierData) {
            $slug = Str::slug($tierData['name']);

            $tier = MembershipTier::updateOrCreate(
                ['code' => $tierData['code']],
                [
                    'name' => $tierData['name'],
                    'slug' => $slug,
                    'annual_price' => $tierData['annual_price'],
                    'is_active' => true,
                    'sort_order' => $tierData['sort_order'],
                ]
            );

            // Create matching Spatie role if it doesn't exist
            Role::firstOrCreate(
                ['name' => $tierData['code'], 'guard_name' => 'web'],
            );

            $this->command->info("  Tier: {$tier->name} ({$tier->code}) — seeded");
        }

        // Non-membership roles
        foreach (['admin', 'staff', 'employer', 'subscriber'] as $roleName) {
            Role::firstOrCreate(
                ['name' => $roleName, 'guard_name' => 'web'],
            );
            $this->command->info("  Role: {$roleName} — seeded");
        }
    }
}
