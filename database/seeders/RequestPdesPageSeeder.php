<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/request-pdes-for-certificate/ for WordPress
 * parity. Two-section layout: intro hero explaining PSDE + shaded form panel
 * for PDES submissions (personal info, activity details, documentation,
 * declaration checkboxes, Submit).
 */
class RequestPdesPageSeeder extends Seeder
{
    public function run(): void
    {
        $certifications = [
            'Chartered Procurement Manager (CPM)®',
            'American Certified Procurement Professional (ACPP)®',
            'American Certified Digital Procurement & Analytics Professional (AC-DPA)®',
            'American Certified Procurement Risk Management Professional (AC-PRM)®',
            'American Certified Strategic Procurement & Supplier Relationship Professional (AC-SPR)®',
            'Chartered Strategic Procurement & Supplier Relationship Manager (CSP-SRM)®',
            'American Certified IT Procurement & Digital Transformation Professional (ACIPDT)®',
            'American Certified Procurement Automation & RPA Professional (AC-PARP)®',
            'American Certified Procurement Data Science & AI Professional (AC-PDS)®',
            'Chartered AI-Driven Sustainable Procurement Manager (CAI-SPM)®',
            'Chartered Healthcare Procurement Solutions Professional (CHPP)®',
            'American Certified Public Sector Procurement & Compliance Professional (AC-PSPC)®',
            'Sustainable Green Procurement & Ethical Sourcing Professional (AC-SGPES)®',
            'American Certified Global Procurement & Cross-Border Supply Professional (AC-GPCS)®',
            'American Certified Procurement Leadership & Change Management Professional (AC-PLCM)®',
            'Chartered Supply Chain Manager (CSCM)®',
            'Chartered Supply Chain Technology Manager (CSCT)®',
            'American Certified Supply Chain Professional (ACSCP)®',
            'Chartered Supply Chain Artificial Intelligence Professional (CSAI)®',
            'American Certified Sustainable and Circular Supply Chain Professional (AC-CSCSP)®',
            'Chartered Sustainable Supply Chain Manager (CSSCM)®',
            'American Certified Blockchain for Supply Chain Professional (AC-BSCP)®',
            'American Certified Supply Chain Cybersecurity Professional (AC-SCCP)®',
            'Chartered Advanced Supply Chain Cybersecurity Manager (CA-SCCM)®',
            'American Certified Digital Supply Chain Integration Professional (AC-DSCI)®',
            'American Certified Supply Chain Digital Transformation Manager (AC-SCDTM)®',
            'American Certified Global Supply Chain Risk and Resilience Professional (AC-GSRP)®',
            'American Certified Tourism Professional (ACTP)®',
            'Chartered Tourism Manager (CTM)®',
            'Chartered Sustainable Culinary Tourism Manager (CSCTM)®',
            'American Certified E-Commerce Strategy and Growth Professional (AC-ESGP)®',
            'Chartered E-Commerce Data Analytics and AI Professional (CED-AI)®',
            'Chartered Global Cross-Border E-Commerce Manager (CGCBE)®',
            'American Certified Ethical Practices & Sustainable E-Commerce Professional (AC-SEEP)®',
            'American Certified Digital Merchandising and User Experience Professional (AC-DMUX)®',
        ];

        $pageData = [
            'intro' => [
                'image'   => '/storage/cms-images/2025/03/1-19.png',
                'heading' => 'Professional Skills Development Education (PSDE)®',
                'body'    => 'Professional Skills Development Education is a structured learning program designed to equip professionals with industry-relevant expertise, technical competencies, and strategic problem-solving abilities necessary for career advancement and certification. This education framework integrates practical training, leadership development, analytical thinking, and real-world case studies to enhance proficiency in specialized fields such as procurement, supply chain, e-commerce, and tourism management. By aligning with global certification standards, emerging industry trends, regulatory requirements, professional skills development fostercontinuous learning, innovation, and career progression, ensuring that individuals remain competitive and well-prepared to meet evolving business challenges.',
                'requirement_html' => '<strong>Total PSDE required:</strong> 35 PSDE are required every 3 years',
            ],
            'form' => [
                'heading'        => 'Earn and Track Your PDES for Certification Renewal',
                'description'    => 'Fill out the form below to register your Professional Development Units (PDES) for certification renewal. Ensure all information is accurate and attach any necessary documentation for verification.',
                'certifications' => $certifications,
                'activity_types' => ['Course', 'Webinar', 'Self-Learning', 'Volunteering,', 'Work as a Practitioner', 'Event', 'Reading'],
                'categories'     => ['Technical Project Management', 'Leadership Development', 'Strategic & Business Management'],
                'declarations'   => [
                    'The information provided is accurate and truthful.',
                    'The PDES activity aligns with AAPSCM\'s Continuing Certification Requirements (CCR).',
                    'I understand that any false submission may result in rejection of PDES.',
                    'I agree to the terms and conditions',
                ],
                'assistance_html' => '<strong>Need Assistance?</strong> Contact us at [ Email: <a href="mailto:info@aapscm.org">info@aapscm.org</a>] or visit [Help Center:+1-(833) 524-2846] for guidance on PDES submission and tracking.',
            ],
        ];

        $page = Page::updateOrCreate(
            ['slug' => 'request-pdes-for-certificate'],
            [
                'title'            => 'Request PDES for Certificate',
                'content'          => null,
                'excerpt'          => 'Submit your Professional Development Education (PDES) activities for AAPSCM® certification renewal.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'seo_title'        => 'Request PDES for Certificate - AAPSCM®',
                'meta_title'       => 'Request PDES for Certificate | AAPSCM',
                'meta_description' => 'Register your Professional Development Education (PDES) activities to renew your AAPSCM® certification.',
                'show_in_nav'      => true,
            ],
        );

        $page->seoMeta()->updateOrCreate(
            ['url_path' => '/request-pdes-for-certificate/'],
            [
                'seo_title' => 'Request PDES for Certificate - AAPSCM®',
                'seo_description' => 'Register your Professional Development Education (PDES) activities to renew your AAPSCM® certification.',
                'canonical_url' => 'https://aapscm.org/request-pdes-for-certificate/',
                'og_title' => 'Request PDES for Certificate - AAPSCM®',
                'og_description' => 'Register your Professional Development Education (PDES) activities to renew your AAPSCM® certification.',
                'robots' => 'index, follow',
            ],
        );
    }
}
