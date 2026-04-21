<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertCharteredAiDrivenSustainableProcurementManagerCaIspmPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'product' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/new-cousres3.png'),
                'image_thumb' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/new-cousres3-600x600.png'),
                'image_alt' => 'Chartered AI-Driven Sustainable Procurement Manager (CA-ISPM)',
                'product_title' => 'Chartered AI-Driven Sustainable Procurement Manager (CA-ISPM)',
                'price' => '$399.99',
                'cta_label' => 'Schedule Training',
                'cta_href' => UrlRewriter::local('https://aapscm.org/product/chartered-ai-driven-sustainable-procurement-manager-ca-ispm/'),
                'category_label' => 'Category:',
                'category_name' => 'Online Course/Exam Payment',
                'category_href' => UrlRewriter::local('https://aapscm.org/product-category/online-course-exam-payment/'),
            ],
            'related' => [
                'heading' => 'Related products',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/07/Untitled-design-8-300x300.png'),
                        'title' => 'AAPSCM® Training Virtual -American Certified Supply-Chain Professional (ACSCP)®',
                        'href' => UrlRewriter::local('https://aapscm.org/product/aapscm-training-virtual-american-certified-supply-chain-professional-acscp/'),
                        'price' => '$1,200.00',
                        'cta_label' => 'Schedule Training',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/07/2-300x300.png'),
                        'title' => 'Chartered Supply Chain Manager (ACSCM)®',
                        'href' => UrlRewriter::local('https://aapscm.org/product/the-american-certified-supply-chain-manager-acscm/'),
                        'price' => '$399.99',
                        'cta_label' => 'Schedule Training',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/07/Untitled-design-3-300x300.png'),
                        'title' => 'AAPSCM® Training Virtual – American Certified Procurement Professional (ACPP)®',
                        'href' => UrlRewriter::local('https://aapscm.org/product/aapscm-training-virtual-american-certified-procurement-professional-acpp/'),
                        'price' => '$1,200.00',
                        'cta_label' => 'Schedule Training',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/07/11-300x300.png'),
                        'title' => 'The American Certified Tourism Professional (ACTP)®',
                        'href' => UrlRewriter::local('https://aapscm.org/product/the-american-certified-tourism-professional-actp/'),
                        'price' => '$399.99',
                        'cta_label' => 'Schedule Training',
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'chartered-ai-driven-sustainable-procurement-manager-ca-ispm'],
            [
                'title' => 'Chartered AI-Driven Sustainable Procurement Manager (CAI-SPM)®',
                'content' => null,
                'excerpt' => 'The AI-Driven Sustainable Procurement Manager Certification (CAI-SPM) is designed to empower professionals to lead the future….',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'Chartered AI-Driven Sustainable Procurement Manager (CA-ISPM) - AAPSCM®',
                'meta_description' => 'The AI-Driven Sustainable Procurement Manager Certification (CAI-SPM) is designed to empower professionals to lead the future….',
                'show_in_nav' => false,
            ],
        );
    }
}
