<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Seeds page_data for each board-of-directors / trainer person_profile page.
 * Source data lives in database/seeders/data/board_profiles_data.php.
 */
class BoardProfilesSeeder extends Seeder
{
    public function run(): void
    {
        $profiles = require database_path('seeders/data/board_profiles_data.php');

        foreach ($profiles as $slug => $data) {
            $page = Page::where('slug', $slug)->first();
            if (! $page) {
                $this->command?->warn("  Skipping {$slug} — page record not found.");
                continue;
            }

            $page->page_data = array_merge($page->page_data ?? [], [
                'person_name'  => $data['person_name'],
                'role'         => $data['role'],
                'bio'          => $data['bio'],
                'avatar_image' => $data['avatar_image'],
            ]);
            $page->save();
        }
    }
}
