<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertCharteredSupplyChainArtificialIntelligenceCsaiPageSeeder extends Seeder
{
    public function run(): void
    {
        $title = 'Chartered Supply Chain Artificial Intelligence (CSAI)®';

        $pageData = [
            'product' => [
                'title' => 'Chartered Supply Chain Artificial Intelligence (CSAI)®',
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/07/1-6.png'),
                'price' => '$399.00',
                'category_label' => 'Category:',
                'category_name' => 'Online Course/Exam Payment',
                'category_href' => UrlRewriter::local('https://aapscm.org/product-category/online-course-exam-payment/'),
                'cta_label' => 'Schedule Training',
                'cta_href' => UrlRewriter::local('https://aapscm.org/product/chartered-supply-chain-artificial-intelligence-csai/?add-to-cart=42626'),
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'chartered-supply-chain-artificial-intelligence-csai'],
            [
                'title' => $title,
                'content' => null,
                'excerpt' => 'Chartered Supply Chain Artificial Intelligence (CSAI)® — Online Course/Exam Payment.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => $title,
                'meta_description' => 'Chartered Supply Chain Artificial Intelligence (CSAI)® — $399.00. Online Course/Exam Payment.',
                'show_in_nav' => false,
            ],
        );
    }
}
