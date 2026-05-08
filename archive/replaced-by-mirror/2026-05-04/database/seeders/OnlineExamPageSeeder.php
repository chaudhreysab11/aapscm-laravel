<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/online-exam/ for WP parity.
 *
 * Page anatomy: hero banner, intro paragraph, 3 numbered steps (each with
 * a description + bullet list), keys-to-success section, important-notes
 * section, and a 3-button CTA row.
 *
 * No images in main content — text-only instructional page.
 */
class OnlineExamPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'heading' => 'Online Exam',
            ],
            'intro' => [
                'heading' => "Take an Exam Online: AAPSCM\u{00ae} Certification Testing Process",
                'lead'    => "AAPSCM\u{00ae} offers a seamless online testing experience through its remote exam proctoring service. This secure and efficient method enables candidates to complete their certification exams from any private space. Follow these steps to ensure a smooth online testing experience:",
            ],
            'steps' => [
                [
                    'number'  => 1,
                    'heading' => 'Review Testing Policies and Procedures',
                    'href'    => '/membership/',
                    'description' => "Before taking your AAPSCM\u{00ae} exam, you must agree to the AAPSCM\u{00ae} Examination and Candidate Agreement. Failure to accept the agreement will result in forfeiture of your exam fee. Ensure you familiarize yourself with the following:",
                    'items' => [
                        'System requirements for your computer and internet connection.',
                        'Exam workspace setup, including removal of books, writing materials, and unplugging additional monitors.',
                        'Policies specific to candidates under 17 years of age.',
                    ],
                ],
                [
                    'number'  => 2,
                    'heading' => 'Run a System Test',
                    'href'    => '/membership/',
                    'description' => 'Use the same computer and network you will use for the exam to complete a system test (5-10 minutes):',
                    'items' => [
                        'Take photos of yourself and your workspace.',
                        'Confirm your workspace meets exam requirements (e.g., no notes or writing within arm\u{2019}s reach).',
                        'Ensure display settings meet minimum requirements, such as 100% scaling for Windows or default for Mac users.',
                        'Failure to adjust these settings may cause the exam content to render improperly. Completing the system test in advance prevents delays during your testing appointment.',
                    ],
                ],
                [
                    'number'  => 3,
                    'heading' => 'Schedule and Complete Your Online Exam',
                    'href'    => '/membership/',
                    'description' => 'Once you verify that your system and workspace meet requirements:',
                    'items' => [
                        'Return to the exam platform using your unique ID to schedule your exam.',
                        'Follow on-screen prompts to select your preferred date and time.',
                        'Ensure a strong and stable internet connection during the exam. Use a wired connection whenever possible.',
                    ],
                ],
            ],
            'keys_to_success' => [
                'heading'     => 'Keys to a Successful Online Test',
                'description' => 'Run the system test. All candidates must verify minimum system requirements and run the system test before scheduling your virtual exam.',
                'items' => [
                    'Run the System Test: Verify your setup before scheduling.',
                    'Reliable Internet Connection: Schedule your exam during a time of minimal internet usage in your household to ensure bandwidth stability.',
                    'Use the Same Computer and Network: Do not switch devices or networks after completing the system test.',
                    'Close All Other Applications: The secure browser will terminate your exam if other applications are running.',
                    'Confirm Time Zone Preferences: Double-check your registered time zone to avoid scheduling errors.',
                ],
            ],
            'important_notes' => [
                'heading'     => 'Important Notes',
                'description' => 'Run the system test. All candidates must verify minimum system requirements and run the system test before scheduling your virtual exam.',
                'items' => [
                    'Online test proctors and software communicate only in English. Translated exams are available exclusively through accredited affiliate academy partners.',
                    "Ensure you register with an AAPSCM\u{00ae}-accredited affiliate to avoid being denied access to the exam.",
                    'Failure to follow the testing procedures, including secure browser guidelines, will result in the forfeiture of your deposit and require additional payment to retake the exam.',
                ],
                'closing' => [
                    'For further assistance or questions, explore our Testing Help Pages or contact info@aapscm.org.',
                    "Achieve your AAPSCM\u{00ae} certification with confidence by following these steps and ensuring your setup is exam-ready!",
                ],
            ],
            'cta_buttons' => [
                ['label' => 'Buy Exam',                              'href' => '/online-courses/'],
                ['label' => 'Purchase course materials',             'href' => '/all-courses/'],
                ['label' => 'Purchase virtual instructor-led Training', 'href' => '/aapscm-training/'],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'online-exam'],
            [
                'title'            => 'Online Exam',
                'content'          => null,
                'excerpt'          => "Take your AAPSCM\u{00ae} certification exam online \u{2014} review policies, run a system test, and schedule your remote proctored exam.",
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "Online Exam \u{2013} AAPSCM\u{00ae}",
                'meta_description' => "Take your AAPSCM\u{00ae} certification exam online. Follow three simple steps: review policies, run a system test, and schedule your remote proctored exam.",
                'show_in_nav'      => false,
            ],
        );
    }
}