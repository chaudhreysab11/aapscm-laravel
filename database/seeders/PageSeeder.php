<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Home',
                'slug' => 'home',
                'content' => '<h1>Welcome to AAPSCM</h1><p>Your trusted platform for supply chain management professionals.</p>',
                'excerpt' => 'Welcome to AAPSCM - your trusted supply chain management platform.',
                'status' => 'published',
                'template' => 'default',
                'meta_title' => 'Home | AAPSCM',
                'meta_description' => 'AAPSCM - Your trusted platform for supply chain management professionals.',
            ],
            [
                'title' => 'About Us',
                'slug' => 'about',
                'content' => '<h1>About AAPSCM</h1><p>AAPSCM is dedicated to advancing supply chain management education and certification.</p>',
                'excerpt' => 'Learn more about AAPSCM and our mission.',
                'status' => 'published',
                'template' => 'default',
                'meta_title' => 'About Us | AAPSCM',
                'meta_description' => 'Learn about AAPSCM and our mission to advance supply chain management.',
            ],
            [
                'title' => 'Contact',
                'slug' => 'contact',
                'content' => '<h1>Contact Us</h1><p>Get in touch with our team for support and inquiries.</p>',
                'excerpt' => 'Contact the AAPSCM team.',
                'status' => 'published',
                'template' => 'default',
                'meta_title' => 'Contact | AAPSCM',
                'meta_description' => 'Contact the AAPSCM team for support and inquiries.',
            ],
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'content' => '<h1>Privacy Policy</h1><p>This page will contain our privacy policy.</p>',
                'excerpt' => 'AAPSCM Privacy Policy.',
                'status' => 'draft',
                'template' => 'full-width',
                'meta_title' => 'Privacy Policy | AAPSCM',
                'meta_description' => 'AAPSCM Privacy Policy.',
            ],
        ];

        foreach ($pages as $page) {
            Page::firstOrCreate(['slug' => $page['slug']], $page);
        }
    }
}
