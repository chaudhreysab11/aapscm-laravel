<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/influencing-suppliers/ for WP parity.
 * Split hero + Register band, then three course sections (Online Negotiation,
 * Financial Accounting, Federal Acquisition Regulation Training) each as a
 * check-list + photo + CTA row.
 */
class InfluencingSuppliersPageSeeder extends Seeder
{
    public function run(): void
    {
        $cartUrl = '/cart/';

        $pageData = [
            'hero' => [
                'image_left'  => '/storage/cms-images/2023/04/png-transparent-square-academic-cap-graduation-ceremony-graduation-cap-blue-angle-hat-2.png',
                'image_right' => '/storage/cms-images/2023/04/istockphoto-1353046641-170667a-2.jpg',
                'heading'     => 'Influencing Suppliers',
                'subheading'  => 'If you received a postcard from the Society, click on the title below to enter the supply management course.',
                'cta_label'   => 'Join Today',
                'cta_url'     => '/membership-plans/',
            ],

            'badge_band' => [
                'image'     => '/storage/cms-images/2023/04/png-transparent-square-academic-cap-graduation-ceremony-graduation-cap-blue-angle-hat-2.png',
                'cta_label' => 'Register Now',
                'cta_url'   => '/membership-plans/',
            ],

            'courses' => [
                [
                    'heading' => 'Online Negotiation Course:',
                    'items'   => [
                        'Influencing Suppliers',
                        'Colleagues and Management',
                        '76 Ways to Improve Purchasing Performance',
                        'Other online purchasing and supply chain courses offered by the AAPSCM®',
                    ],
                    'image'     => '/storage/cms-images/2023/04/pretty-teen-girl-sitting-table-with-laptopstudying-1.jpg',
                    'cta_label' => 'Join Now',
                    'cta_url'   => $cartUrl,
                ],
                [
                    'heading' => 'Financial Accounting Course:',
                    'items'   => [
                        'Accounting and Finance',
                        'Cost Management for Buyers and Managers',
                    ],
                    'image'     => '/storage/cms-images/2023/04/pexels-andrea-piacquadio-3769021-scaled-1-1-1024x683.jpg',
                    'cta_label' => 'Process now',
                    'cta_url'   => $cartUrl,
                ],
                [
                    'heading' => 'Federal Acquisition Regulation Training',
                    'items'   => [
                        'Applied Cost and Price Analysis',
                        'Body Language',
                        'Business Ethics for Buyers and Sellers',
                        'Diversity for Purchasing and Business',
                        'Essential Law for Buyers and Sellers',
                        'Forecasting for Buyers, Managers, and Business Executives',
                        'Fundamentals of Business Buying and Purchasing Management',
                        'Green Purchasing and Sustainability',
                        'How to Be a Smart MRO Buyer',
                        'How to Buy Internationally',
                        'How to Get More Sales from Professional Purchasing Agents and Business Buyers',
                        'How to Plan Your Career and Prepare a Resume',
                        'How to Save $Thousands Buying a Car',
                        'Managing Inventory - Maintaining the Proper Level',
                        'Managing Quality - How to Get the Quality and Service You Want',
                        'Math for Purchasing and Business',
                        'Preparation for CGPP Exam',
                        'Preparation for CPPM Exam',
                        'Spend Analysis Using Excel',
                        'The Science and Art of Negotiation',
                    ],
                    'footer_note' => 'Use of Terms and Condition, Documenting the Purchase Agreement',
                    'image'       => '/storage/cms-images/2023/04/pexels-andrea-piacquadio-3769021-scaled-1-1-1024x683.jpg',
                    'cta_label'   => 'Process now',
                    'cta_url'     => $cartUrl,
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'influencing-suppliers'],
            [
                'title'            => 'Influencing Suppliers',
                'content'          => null,
                'excerpt'          => 'AAPSCM® Influencing Suppliers course catalog — Online Negotiation, Financial Accounting, and Federal Acquisition Regulation training modules.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'Influencing Suppliers | AAPSCM',
                'meta_description' => 'Enroll in AAPSCM® supply-management courses — negotiation, accounting, and Federal Acquisition Regulation topics for procurement professionals.',
                'show_in_nav'      => true,
            ],
        );
    }
}
