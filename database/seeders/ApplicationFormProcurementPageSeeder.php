<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Seeds https://aapscm.org/application-form-for-free-training-in-procurement-management/
 *
 * This page contains a multi-section application form. The form is rendered
 * by a dedicated controller + Blade template; the Page record provides SEO
 * metadata and CMS integration.
 */
class ApplicationFormProcurementPageSeeder extends Seeder
{
    public function run(): void
    {
        Page::updateOrCreate(
            ['slug' => 'application-form-for-free-training-in-procurement-management'],
            [
                'title'            => 'Application Form for Free Training in Procurement Management',
                'template'         => '',
                'status'           => 'published',
                'is_published'     => true,
                'content'          => '',
                'excerpt'          => 'Apply for free procurement management training for US college students.',
                'page_data'        => [],
                'meta_title'       => "Application Form for Free Training in Procurement Management - AAPSCM\u{00ae}",
                'meta_description' => 'Apply for free procurement management training. Open to US college students. Learn supplier negotiation, contract management, and strategic sourcing.',
                'show_in_nav'      => false,
            ],
        );
    }
}