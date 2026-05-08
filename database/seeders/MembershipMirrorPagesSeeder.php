<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;
use Illuminate\Database\Seeder;

class MembershipMirrorPagesSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->slugs() as $slug) {
            $seeder = new class($slug) extends ExactMirrorPageSeeder {
                public function __construct(private readonly string $mirrorSlug)
                {
                }

                protected function slug(): string
                {
                    return $this->mirrorSlug;
                }

                protected function payloadFile(): string
                {
                    return $this->mirrorSlug . '_data.php';
                }
            };

            $seeder->run();
        }
    }

    /**
     * @return string[]
     */
    private function slugs(): array
    {
        return [
            'academic-fellow-membership',
            'benefits-and-resources',
            'chartered-professional-membership',
            'chartered-supply-chain-professional-member',
            'corporate-fellow-membership',
            'corporate-membership',
            'digital-badges',
            'emerging-leader-fellow-membership',
            'fellow-membership',
            'grand-fellow-membership',
            'international-fellow-membership',
            'membership-faqs',
            'membership',
            'professional-fellow-membership',
            'professional-member-criteria',
            'professional-membership-renewal',
            'professional-membership',
            'specialist-fellow-membership',
            'student-membership',
            'why-join-aapscm',
        ];
    }
}
