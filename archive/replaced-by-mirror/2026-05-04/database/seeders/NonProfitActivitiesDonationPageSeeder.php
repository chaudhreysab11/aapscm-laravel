<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/non-profit-activities-donation/ for WP parity.
 * Mission + philanthropic objective, 6-program grid, Donations heading with
 * 4 donation-action cards, "Facts about hunger in America" list, and
 * "How this donation will be utilized" checklist paired with imagery.
 */
class NonProfitActivitiesDonationPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'heading' => 'Non-Profit Activities & Donation',
            ],

            'mission' => [
                'heading' => 'Our Mission',
                'body'    => 'American Association of Procurement, Supply-Chain Management Professionals (AAPSCM)® aims to promote and develop high standards of professional skill, ability, and integrity among all those engaged in Procurement, Sustainable, supply chain, and Tourism management. Through education, training, certifications, philanthropy, and market research, AAPSCM® promotes industry growth; the development of a skilled workforce, and a commitment to creating an environment where innovation happens and where production or service provision processes embolden the Inputs of the right quality, delivered in the right quantity, to the right place, at the right time, or the right price for helpless businesses in the US',
            ],

            'objective' => "Our overall philanthropic objective is to help less privileged business students and small and medium-sized businesses acquire the skills necessary to become skilled professionals who can ensure that risks of supply failure or disruption are minimized and/or \u{2018}covered\u{2019} by contingency plans in global commerce. We represent the nation\u{2019}s leading procurement and supply chain professionals with over 130 members",

            'programs' => [
                'heading' => 'Our Philanthropic Programs',
                'items'   => [
                    [
                        'image' => '/storage/cms-images/2023/10/mission-1.png',
                        'title' => '1. We provide Product Philanthropy Procurement',
                        'body'  => 'We help free up space in overcrowded warehouses with overstocked items that must sometimes be moved. We do this by collecting these products and donating the unwanted items to nonprofits like food banks in the state of South Carolina, North Carolina, and Georgia. We also provide logistical support in moving the items. Between March 2022-May 2022, we have moved tons of food items to various food banks in these states. Our advisory board chair provides necessary verification to ensure that some of the items offer disaster relief and assistance to those in need.',
                    ],
                    [
                        'image' => '/storage/cms-images/2023/10/mission-2.png',
                        'title' => '2.Feed the hungry covering States of Carolina, Georgia & North Carolina',
                        'body'  => "We also engage in food distributions to the Hungry in our respective states. We require donations for all logistics. Hunger can affect people from all walks of life. Millions of people in America are just one job loss, missed paycheck, or medical emergency away from hunger. But hunger doesn't affect everyone equally - some groups face like children, seniors, Black, Indigenous, and other people of color face hunger at much higher rates. Hunger also most often affects our neighbors who live in poverty",
                    ],
                    [
                        'image' => '/storage/cms-images/2023/10/mission-3.png',
                        'title' => '3.Humanitarian Logistic programs',
                        'body'  => "Our mission is to also donate to charities by setting up logistics in small and retail companies to collect donations for charities like the wounded warrior\u{2019}s project and Boy scouts of America",
                    ],
                    [
                        'image' => '/storage/cms-images/2023/10/mission-4.png',
                        'title' => '4. Free Procurement and Supply Chain Philanthropy Workshops',
                        'body'  => 'For small business professionals and Business students in tertiary institutions in the States of South Carolina, North Carolina, and Georgia. We offer several educational tools and certification programs Free of charge to small and medium-sized businesses and College business students in public institutions in the states of South Carolina, North Carolina, and Georgia, including the newly created ACPM, ACPP, and ACSCM certifications to provide support to these companies with an interest in bolstering their supply chain processes knowledge and skills. This is meant to provide a one-stop shop to help businesses and business students tap into thought leadership and emerging best practices in the field.',
                    ],
                    [
                        'image' => '/storage/cms-images/2023/10/mission-5.png',
                        'title' => '5. Supply Chain Resiliency Programs for small and medium-sized businesses',
                        'body'  => 'This program is one of the initiatives for our 2023-2027 development plans. We plan to provide logistics to small and medium-sized businesses including the healthcare industries in the state of South Carolina, North Carolina, and Georgia to shore up domestic manufacturing and help new suppliers come to market, communicate about anticipated demand surges to allow manufacturers to increase capacity, avert supply shortages, and protect healthcare providers and patients from counterfeit or inferior medical products.',
                    ],
                    [
                        'image' => '/storage/cms-images/2023/10/mission-6.png',
                        'title' => '6. Free allocation of resources for procurement and supply chains management',
                        'body'  => 'We have built an alliance partnership with technology companies like (Oracle and Amazon) to help businesses with modern data repositories to help provide easy access for organizations to find the resources they need to invest in their procurement and supply chains',
                    ],
                ],
            ],

            'donations' => [
                'heading' => 'Donations',
                'cards'   => [
                    [
                        'icon'  => '/storage/cms-images/2023/10/plantation-1.png',
                        'title' => 'GIVE TODAY',
                        'url'   => '/donations/',
                        'label' => 'Donation',
                    ],
                    [
                        'icon'  => '/storage/cms-images/2023/10/icon-2.png',
                        'title' => 'GIVE MONTHLY',
                        'url'   => '/donations/',
                        'label' => 'Donation',
                    ],
                    [
                        'icon'  => '/storage/cms-images/2023/10/icon-3.png',
                        'title' => 'FUNDRAISE',
                        'url'   => '/donations/',
                        'label' => 'Donation',
                    ],
                    [
                        'icon'  => '/storage/cms-images/2023/10/icon-4.png',
                        'title' => 'VOLUNTEER',
                        'url'   => '/donations/',
                        'label' => 'Donation',
                    ],
                ],
            ],

            'facts' => [
                'heading' => 'Facts about hunger in America',
                'image'   => '/storage/cms-images/2023/10/memeber-1.jpg',
                'items'   => [
                    'According to the USDA, more than 34 million people, including 9 million children, in the United States are food insecure.',
                    'The pandemic has increased food insecurity among families with children and communities of color, who already faced hunger at much higher rates before the pandemic',
                    'Every community in the country is home to families who face hunger. But rural communities are especially hard hit by hunger.',
                    'Many households that experience food insecurity do not qualify for federal nutrition programs and visit their local food banks and other food programs for extra support.',
                    'Hunger in African American, Latino, and Native American communities is higher because of systemic racial injustice. To achieve a hunger-free America, we must address the root causes of hunger and structural and systemic inequities',
                ],
            ],

            'utilized' => [
                'heading' => 'How this donation will be utilized',
                'body'    => 'Your donations fund our mission in many important ways. First, we presently intend to use any donations acquired to implement all our programs. This would help support donations presently provided by members. We need money for logistics like the following:',
                'image'   => '/storage/cms-images/2023/10/acpp-5.jpg',
                'items'   => [
                    'Advertising, marketing, and communications',
                    'Truck and van expense (collection and distribution of food items)',
                    'Logistics for Shipping Supplies to Food Banks.',
                    'College Business Students Workshops expenses in the states of SC, NC, and Georgia. This workshop is free for all Business students including the sitting and acquisition of the certifications.',
                    'Staff Development and Transportation of Volunteers',
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'non-profit-activities-donation'],
            [
                'title'            => 'Non-Profit Activities & Donation',
                'content'          => null,
                'excerpt'          => 'AAPSCM® non-profit activities and donation programs — product philanthropy, hunger relief, humanitarian logistics, and workforce workshops.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'Non-Profit Activities & Donation | AAPSCM',
                'meta_description' => 'AAPSCM® philanthropic mission: product philanthropy procurement, feeding the hungry, humanitarian logistics, free workshops, and supply-chain resiliency programs.',
                'show_in_nav'      => true,
            ],
        );
    }
}
