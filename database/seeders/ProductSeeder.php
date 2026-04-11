<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Basic Membership Package',
                'slug' => 'basic-membership-package',
                'description' => 'Entry-level membership with access to core features.',
                'price' => 29.99,
                'stock' => 100,
                'sku' => 'MEM-BASIC-001',
                'is_active' => true,
            ],
            [
                'name' => 'Premium Membership Package',
                'slug' => 'premium-membership-package',
                'description' => 'Premium membership with full access to all features.',
                'price' => 79.99,
                'stock' => 100,
                'sku' => 'MEM-PREM-001',
                'is_active' => true,
            ],
            [
                'name' => 'Enterprise Membership Package',
                'slug' => 'enterprise-membership-package',
                'description' => 'Enterprise-level membership with priority support.',
                'price' => 199.99,
                'stock' => 50,
                'sku' => 'MEM-ENT-001',
                'is_active' => true,
            ],
            [
                'name' => 'Certification Exam Voucher',
                'slug' => 'certification-exam-voucher',
                'description' => 'Voucher for taking a certification exam.',
                'price' => 49.99,
                'stock' => 200,
                'sku' => 'CERT-VOUCHER-001',
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(['slug' => $product['slug']], $product);
        }
    }
}
