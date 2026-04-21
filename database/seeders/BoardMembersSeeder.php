<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\BoardMember;
use Illuminate\Database\Seeder;

/**
 * Architect directive (2026-04-20): board_members table is the single
 * source of truth. This seeder lifts the 13 records previously embedded
 * in BoardOfDirectorsPageSeeder's JSON `members` array into proper rows.
 *
 * Idempotent on (name, sort_order) — safe to re-run without duplicating.
 *
 * Public site renders these via CmsPageController -> resources/views/cms/
 * page/board-of-directors.blade.php. Filament admin manages them via
 * App\Filament\Resources\BoardMemberResource.
 */
class BoardMembersSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name' => 'Dr. Sandra Grouse',
                'role' => 'Executive Board Chair',
                'affiliation' => "Chief Executive Vice President, Chicago Solutions Inc.\nSchaumburg, IL USA",
                'avatar_image' => '/storage/cms-images/2023/10/1-4.png',
                'profile_page_slug' => 'board-of-directors-dr-sandra-grouse',
            ],
            [
                'name' => 'Tracy McKinnis',
                'role' => 'Chief Legal Officer',
                'affiliation' => "President and CEO,\nMinimax Distribution, LLC\nNew York, USA",
                'avatar_image' => '/storage/cms-images/2023/10/8-1.png',
                'profile_page_slug' => 'board-of-directors-tracy-mckinnis',
            ],
            [
                'name' => 'Dr. Richmond Adebiaye',
                'role' => 'Chairman, Advisory Board',
                'affiliation' => "Professor\nUniversity of South Carolina Upstate\nSpartanburg, SC USA",
                'avatar_image' => '/storage/cms-images/2023/10/7-1.png',
                'profile_page_slug' => 'board-of-directors-dr-richmond-adebiaye',
            ],
            [
                'name' => 'Dr. Mark Pieffer',
                'role' => 'Executive Director, Certifications',
                'affiliation' => "Associate Dean, School of Business\nJones International University, CO USA",
                'avatar_image' => '/storage/cms-images/2023/10/6-2.png',
                'profile_page_slug' => 'board-of-directors-dr-mark-pieffer',
            ],
            [
                'name' => 'Dr. Theophilus Owusu',
                'role' => 'Board Executive Director, Affiliate Partners Unit',
                'affiliation' => "Professor,\nKeiser University, FL USA",
                'avatar_image' => '/storage/cms-images/2023/10/5-2.png',
                'profile_page_slug' => 'board-of-directors-dr-theophilus-owusu',
            ],
            [
                'name' => 'Dr. Ronald Kisega',
                'role' => 'Director of Operations, Testing',
                'affiliation' => "Professor,\nNorthwestern University, IL USA",
                'avatar_image' => '/storage/cms-images/2023/10/4-3.png',
                'profile_page_slug' => 'board-of-directors-dr-ronald-kisega',
            ],
            [
                'name' => 'Dr. Haroun Alryalat',
                'role' => 'Global Advisory Council Member',
                'affiliation' => "Associate Professor\nUniversity of Bahrain",
                'avatar_image' => '/storage/cms-images/2023/10/33.png',
                'profile_page_slug' => 'board-of-directors-dr-haroun-alrylat',
            ],
            [
                'name' => 'Dr. Jason Matyus',
                'role' => 'Advisory Board Executive Director, Training, Course Development, and Examination',
                'affiliation' => null,
                'avatar_image' => '/storage/cms-images/2023/10/22-1.png',
                'profile_page_slug' => 'board-of-directors-dr-jason-matyus',
            ],
            [
                'name' => 'Jonathan Akisanmi',
                'role' => 'Director of Finance & Chief Financial Officer (CFO)',
                'affiliation' => null,
                'avatar_image' => '/storage/cms-images/2023/10/33.jpg',
                'profile_page_slug' => 'board-of-directors-jonathan-akisanmi',
            ],
            [
                'name' => 'James Raussen',
                'role' => "AAPSCM\u{00ae} Executive Trainer, Key Speaker & Strategic Advisor",
                'affiliation' => null,
                'avatar_image' => '/storage/cms-images/2025/04/trainer-img-1.png',
                'profile_page_slug' => 'james-raussen',
            ],
            [
                'name' => 'Gleb Mikulich',
                'role' => 'Expertise in supply chain, procurement, logistics, and digital transformation.',
                'affiliation' => null,
                'avatar_image' => '/storage/cms-images/2024/12/22-1.png',
                'profile_page_slug' => 'gleb-mikulich',
            ],
            [
                'name' => 'Mohamed Aboelela',
                'role' => "Director of Strategic Operations \u{2013} MENA at AAPSCM\u{00ae}",
                'affiliation' => null,
                'avatar_image' => '/storage/cms-images/2026/04/31f9d6eb-c108-439c-8097-cdb3149edab6-200x300.jpeg',
                'profile_page_slug' => 'mohamed-aboelela',
            ],
            [
                'name' => 'Mohammed Zul Jamal',
                'role' => 'REGIONAL PR MANAGER (MENA Region)',
                'affiliation' => null,
                'avatar_image' => '/storage/cms-images/2026/04/WhatsApp-Image-2026-04-16-at-22.13.01-233x300.jpeg',
                'profile_page_slug' => 'mohammed-zul-jamal',
            ],
        ];

        foreach ($members as $index => $row) {
            BoardMember::updateOrCreate(
                [
                    'name' => $row['name'],
                    'sort_order' => $index,
                ],
                [
                    'role' => $row['role'],
                    'affiliation' => $row['affiliation'],
                    'avatar_image' => $row['avatar_image'],
                    'profile_page_slug' => $row['profile_page_slug'],
                    'is_active' => true,
                ],
            );
        }
    }
}
