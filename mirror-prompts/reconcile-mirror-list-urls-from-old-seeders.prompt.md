Repair corrupt certification/training links inside mirrored list pages by copying the trusted local URLs from the same page's older Laravel seeder/data source.

Goal:
- Investigate only mirrored pages whose body content contains lists, cards, tables, or CTA links pointing to other certifications or training pages.
- For each eligible page, compare the current mirror payload against that same page's older non-mirror seeder/data source.
- Match items by name/title/label and replace the mirrored item URL with the trusted URL from the old source.
- Fix this at the seed-data or page-specific mirror-transform layer, not by manually editing rendered HTML page-by-page.

Work only on these confirmed same-page old-vs-mirror pairs:

1. Workshop Trainings
- Old seeder: [database/seeders/WorkshopTrainingsPageSeeder.php](database/seeders/WorkshopTrainingsPageSeeder.php)
- Old trusted data: [database/seeders/data/workshop_trainings_data.php](database/seeders/data/workshop_trainings_data.php)
- Current mirror seeder: [database/seeders/TrainingMirrorPagesSeeder.php](database/seeders/TrainingMirrorPagesSeeder.php)
- Current mirror payload: [database/seeders/data/workshop-trainings_data.php](database/seeders/data/workshop-trainings_data.php)
- Matching surface: workshop certification table rows and Learn More links.

2. All Courses
- Old seeder: [database/seeders/AllCoursesPageSeeder.php](database/seeders/AllCoursesPageSeeder.php)
- Old trusted data: [database/seeders/data/all_courses_cards.php](database/seeders/data/all_courses_cards.php)
- Current mirror seeder: [database/seeders/TrainingMirrorPagesSeeder.php](database/seeders/TrainingMirrorPagesSeeder.php)
- Current mirror payload: [database/seeders/data/all-courses_data.php](database/seeders/data/all-courses_data.php)
- Matching surface: certification/training card titles and destination links.

3. AAPSCM Training
- Old seeder: [database/seeders/AapscmTrainingPageSeeder.php](database/seeders/AapscmTrainingPageSeeder.php)
- Old trusted data: [database/seeders/data/aapscm_training_cards.php](database/seeders/data/aapscm_training_cards.php)
- Current mirror seeder: [database/seeders/TrainingMirrorPagesSeeder.php](database/seeders/TrainingMirrorPagesSeeder.php)
- Current mirror payload: [database/seeders/data/aapscm-training_data.php](database/seeders/data/aapscm-training_data.php)
- Matching surface: schedule/training cards and their hrefs.

4. Online Courses
- Old seeder: [database/seeders/OnlineCoursesPageSeeder.php](database/seeders/OnlineCoursesPageSeeder.php)
- Old trusted data: [database/seeders/data/online_courses_cards.php](database/seeders/data/online_courses_cards.php)
- Current mirror seeder: [database/seeders/TrainingMirrorPagesSeeder.php](database/seeders/TrainingMirrorPagesSeeder.php)
- Current mirror payload: [database/seeders/data/online-courses_data.php](database/seeders/data/online-courses_data.php)
- Matching surface: product/course cards and member/non-member or primary CTA links.

5. Certifications for Professionals
- Old seeder: [database/seeders/CertificationsForProfessionalsPageSeeder.php](database/seeders/CertificationsForProfessionalsPageSeeder.php)
- Old trusted data: [database/seeders/data/certifications_for_professionals_cards.php](database/seeders/data/certifications_for_professionals_cards.php)
- Current mirror seeder: [database/seeders/CertificationMirrorPagesSeeder.php](database/seeders/CertificationMirrorPagesSeeder.php)
- Current mirror payload: [database/seeders/data/certifications-for-professionals_data.php](database/seeders/data/certifications-for-professionals_data.php)
- Matching surface: main certification cards and AI course cards.

6. Procurement Management Certifications
- Old seeder: [database/seeders/ProcurementManagementCertificationsPageSeeder.php](database/seeders/ProcurementManagementCertificationsPageSeeder.php)
- Old trusted data: [database/seeders/data/procurement_management_certifications_data.php](database/seeders/data/procurement_management_certifications_data.php)
- Current mirror seeder: [database/seeders/CertificationMirrorPagesSeeder.php](database/seeders/CertificationMirrorPagesSeeder.php)
- Current mirror payload: [database/seeders/data/procurement-management-certifications_data.php](database/seeders/data/procurement-management-certifications_data.php)
- Matching surface: certification cards and their Learn More links.

Additional cross-source pages to include in this pass:

7. Seminars & Courses
- Current mirror seeder: [database/seeders/TrainingMirrorPagesSeeder.php](database/seeders/TrainingMirrorPagesSeeder.php)
- Current mirror payload: [database/seeders/data/seminars-courses_data.php](database/seeders/data/seminars-courses_data.php)
- Trusted URL source to use: [database/seeders/data/online_courses_cards.php](database/seeders/data/online_courses_cards.php)
- Reason: the seminar/course destinations should align with the same course URLs already curated in the online-courses source.
- Matching surface: seminar/course cards, banners, and course destination links in mirrored content.

8. Certifications Index
- Current mirror seeder: [database/seeders/CertificationMirrorPagesSeeder.php](database/seeders/CertificationMirrorPagesSeeder.php)
- Current mirror payload: [database/seeders/data/certifications_data.php](database/seeders/data/certifications_data.php)
- Trusted URL source to use: [database/seeders/data/certifications_for_professionals_cards.php](database/seeders/data/certifications_for_professionals_cards.php)
- Matching surface: certification cards, lists, and CTA links that point to certification detail pages.

9. Artificial Intelligence (AI) Courses
- Current mirror seeder: [database/seeders/TrainingMirrorPagesSeeder.php](database/seeders/TrainingMirrorPagesSeeder.php)
- Current mirror payload: [database/seeders/data/artificial-intelligence-ai-courses_data.php](database/seeders/data/artificial-intelligence-ai-courses_data.php)
- Trusted URL source to use: [database/seeders/data/certifications_for_professionals_cards.php](database/seeders/data/certifications_for_professionals_cards.php)
- Matching surface: AI course or certification cards and destination links.

10. Supply Chain Management Certifications
- Current mirror seeder: [database/seeders/CertificationMirrorPagesSeeder.php](database/seeders/CertificationMirrorPagesSeeder.php)
- Current mirror payload: [database/seeders/data/supply-chain-management-certifications_data.php](database/seeders/data/supply-chain-management-certifications_data.php)
- Trusted URL source to use: [database/seeders/data/certifications_for_professionals_cards.php](database/seeders/data/certifications_for_professionals_cards.php)
- Matching surface: certification cards and Learn More links.

11. Tourism Management Certifications
- Current mirror seeder: [database/seeders/CertificationMirrorPagesSeeder.php](database/seeders/CertificationMirrorPagesSeeder.php)
- Current mirror payload: [database/seeders/data/tourism-management-certifications_data.php](database/seeders/data/tourism-management-certifications_data.php)
- Trusted URL source to use: [database/seeders/data/certifications_for_professionals_cards.php](database/seeders/data/certifications_for_professionals_cards.php)
- Matching surface: certification cards and Learn More links.

12. E-Commerce Certifications
- Current mirror seeder: [database/seeders/CertificationMirrorPagesSeeder.php](database/seeders/CertificationMirrorPagesSeeder.php)
- Current mirror payload: [database/seeders/data/e-commerce-certifications_data.php](database/seeders/data/e-commerce-certifications_data.php)
- Trusted URL source to use: [database/seeders/data/certifications_for_professionals_cards.php](database/seeders/data/certifications_for_professionals_cards.php)
- Matching surface: certification cards and Learn More links.

13. Combined Procurement Logistics and Supply Chain Certifications
- Current mirror seeder: [database/seeders/CertificationMirrorPagesSeeder.php](database/seeders/CertificationMirrorPagesSeeder.php)
- Current mirror payload: [database/seeders/data/combined-procurement-logistics-and-supply-chain-certifications_data.php](database/seeders/data/combined-procurement-logistics-and-supply-chain-certifications_data.php)
- Trusted URL source to use: [database/seeders/data/certifications_for_professionals_cards.php](database/seeders/data/certifications_for_professionals_cards.php)
- Matching surface: certification cards and Learn More links.

Matching rules:
1. Build the trusted URL map from the specified source file for that page.
2. Match items by normalized visible title/name/label, not by current broken URL.
3. Normalization should ignore case, extra whitespace, smart quotes, punctuation differences, HTML tags, and common suffix noise like trademark symbols or duplicated spacing.
4. When the trusted source uses an abbreviation and the mirror uses a longer visible label, use the closest exact visible-title match first; only fall back to abbreviation-based matching when the page structure makes it obvious they are the same item.
5. Only replace URLs for certification/training destinations that clearly represent the same item in both sources.
6. Leave unmatched items unchanged and report them.
7. For pages using [database/seeders/data/certifications_for_professionals_cards.php](database/seeders/data/certifications_for_professionals_cards.php) as the trusted source, match by course or certification name first and reuse the URL from the best same-name card entry.
8. For [database/seeders/data/seminars-courses_data.php](database/seeders/data/seminars-courses_data.php), use [database/seeders/data/online_courses_cards.php](database/seeders/data/online_courses_cards.php) as the trusted source and match by course name before updating the mirrored link.

Implementation rules:
1. Start by inspecting the current mirror payload file and the old source file for each page above.
2. Determine the narrowest durable repair point:
   - Prefer page-specific mirror seeder transforms in [database/seeders/TrainingMirrorPagesSeeder.php](database/seeders/TrainingMirrorPagesSeeder.php) or [database/seeders/CertificationMirrorPagesSeeder.php](database/seeders/CertificationMirrorPagesSeeder.php) when the mirror payload is raw Elementor HTML.
   - Prefer updating the mirror payload file directly only when the affected links are clearly localized to a small, stable set of entries.
   - Keep the shared renderer [resources/views/components/cms/exact-mirror-page.blade.php](resources/views/components/cms/exact-mirror-page.blade.php) unchanged unless a single generic rule is truly justified across multiple pages.
3. Do not change slugs, routes, visible copy, layout, or non-certification/non-training links.
4. Do not revert any page back to the old bespoke Blade implementation.

Validation requirements:
- Run `get_errors` on every touched file.
- Reseed only the affected mirror seeder class or classes.
- Run `php artisan view:clear` after reseeding.
- Validate the affected local pages in the browser.
- Confirm the repaired links now use the trusted local Laravel paths from the old source.
- Confirm corrupt variants are gone from the touched page content.
- Provide a short report grouped by page:
  - page slug
  - old source file used
  - mirror file or transform updated
  - item titles matched
  - URLs replaced
  - unmatched items, if any

Important constraints:
- Do not use unrelated route inventories as the primary replacement source when a same-page old seeder/data file exists.
- Do not touch header/footer/menu links or unrelated content areas during this pass.
- Use the page-specific trusted source listed above even when it is a cross-source mapping, and report any titles that do not resolve to a confident match.
