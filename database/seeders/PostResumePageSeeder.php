<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class PostResumePageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string, mixed> $data */
        $data = require database_path('seeders/data/post-resume_data.php');
        $fields = $data['resume_form']['fields'];

        $firstOptions = static function (string $label) use ($fields): array {
            foreach ($fields as $field) {
                if (($field['label'] ?? '') === $label) {
                    return $field['options'] ?? [];
                }
            }

            return [];
        };

        $pageData = [
            'title_band' => [
                'title' => $data['title_band']['title'],
                'background' => UrlRewriter::image($data['title_band']['background'] ?? ''),
            ],
            'guest_state' => [
                'heading' => $data['guest_state']['heading'],
                'message' => $data['guest_state']['message'],
                'suggestion' => 'Suggestion: keep account setup short here, then complete the full resume details immediately after sign in.',
            ],
            'resume_form' => [
                'salary_units' => $firstOptions('Chosse Unit'),
                'education_levels' => $firstOptions('Highest Level of Education:'),
                'career_levels' => $firstOptions('Current Career Level:'),
                'industry_options' => $firstOptions('Industry Experience'),
                'experience_options' => $firstOptions('Year Of Experience'),
                'job_status_options' => $firstOptions('Job Status (How many hours are you wanting to work?)'),
                'job_preference_options' => $firstOptions('Job Preference (What type of work are you looking for?)'),
                'relocation_label' => $firstOptions('Relocation')[0] ?? 'I am willing to relocate.',
                'employment_history_groups' => $data['structural_counts']['employment_history_groups'] ?? 3,
            ],
            'source_anomalies' => $data['source_anomalies'] ?? [],
            'skipped_sections' => $data['skipped_sections'] ?? [],
        ];

        Page::updateOrCreate(
            ['slug' => 'post-resume'],
            [
                'source_id' => $data['source_id'],
                'title' => 'Post Resume',
                'content' => null,
                'excerpt' => $data['guest_state']['message'],
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => $data['meta']['title'],
                'meta_description' => $data['meta']['description'],
                'seo_title' => $data['meta']['title'],
                'seo_description' => $data['meta']['description'],
                'seo_canonical' => UrlRewriter::canonical('post-resume'),
                'show_in_nav' => false,
            ],
        );
    }
}
