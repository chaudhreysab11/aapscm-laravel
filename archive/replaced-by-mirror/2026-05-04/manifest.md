# Replaced-By-Mirror Archive Manifest

Date: 2026-05-04

Scope:
- Archive only legacy Blade page files whose slug is now routed to a different active view in `app/Http/Controllers/CmsPageController.php`.
- Preserve relative paths under `archive/replaced-by-mirror/2026-05-04/`.
- Do not archive seeders or mirror payload data unless they are proven unused.
- The authoritative final archive set is the archived file tree in this folder, derived by `archive-mirror-replaced.ps1` from the current controller and seeder slug mappings.

Classification Summary:
- `ARCHIVE_SUPERSEDED`: 154 Blade views, 162 legacy page seeders, and 3 orphaned legacy data files moved under this archive root.
- `KEEP_ACTIVE_RUNTIME`: active mirror wrapper views, direct slug-mapped views, active mirror payload data, reconciliation/helper data files, and mirror seeders still referenced by the current seeding pipeline.
- `NEEDS_REVIEW`: none moved in this batch.

Final Notes:
- `database/seeders/DatabaseSeeder.php` was updated to stop calling the archived individual page seeders for mirror-backed slugs and to rely on the active mirror seeders instead.
- Active controller-targeted wrapper views were restored after an over-broad archive pass, and the archive/restore helper scripts were narrowed to the `SLUG_VIEWS` block so future runs preserve runtime targets.
- The second pass added the missed certification family: category pages, `cert-*` detail views, and individual `Cert*PageSeeder.php` files shadowed by `CERTIFICATION_MIRROR_SLUGS`.
- Only 3 data files were safe to archive in this pass: `database/seeders/data/certifications_faq_data.php`, `database/seeders/data/certification_process_data.php`, and `database/seeders/data/us_charters_data.php`.
- Similar-looking legacy data files such as `database/seeders/data/procurement_management_certifications_data.php` remain active because mirror seeders still read them for reconciliation.
- Similar-looking direct exact pages such as `aapscm-training-virtual-chartered-supply-chain-artificial-intelligence-csaianalyst` remain active and were intentionally not archived.

Historical detail below reflects the first-pass inventory and is not exhaustive after the second-pass certification/seeder archive. Use the archived file tree as the complete source of truth.

ARCHIVE_SUPERSEDED

General Mirror Replacements:
- `resources/views/cms/page/4-steps-to-verification.blade.php` -> active route now uses `cms.page.4-steps-to-verification-mirror`
- `resources/views/cms/page/about-testing-options.blade.php` -> active route now uses `cms.page.about-testing-options-mirror`
- `resources/views/cms/page/book.blade.php` -> active route now uses `cms.page.book-mirror`
- `resources/views/cms/page/career-center.blade.php` -> active route now uses `cms.page.career-center-exact-mirror`
- `resources/views/cms/page/certificate-exam-policies.blade.php` -> active route now uses `cms.page.certificate-exam-policies-mirror`
- `resources/views/cms/page/communities.blade.php` -> active route now uses `cms.page.communities-mirror`
- `resources/views/cms/page/donations.blade.php` -> active route now uses `cms.page.donations-mirror`
- `resources/views/cms/page/exam-objectives.blade.php` -> active route now uses `cms.page.exam-objectives-mirror`
- `resources/views/cms/page/exam-proctoring.blade.php` -> active route now uses `cms.page.exam-proctoring-mirror`
- `resources/views/cms/page/how-to-apply.blade.php` -> active route now uses `cms.page.how-to-apply-mirror`
- `resources/views/cms/page/influencing-suppliers.blade.php` -> active route now uses `cms.page.influencing-suppliers-mirror`
- `resources/views/cms/page/job-listing.blade.php` -> active route now uses `cms.page.career-center-exact-mirror`
- `resources/views/cms/page/member-services.blade.php` -> active route now uses `cms.page.member-services-mirror`
- `resources/views/cms/page/non-profit-activities-donation.blade.php` -> active route now uses `cms.page.non-profit-activities-donation-mirror`
- `resources/views/cms/page/online-exam.blade.php` -> active route now uses `cms.page.online-exam-mirror`
- `resources/views/cms/page/post-job-opportunities.blade.php` -> active route now uses `cms.page.career-center-exact-mirror`
- `resources/views/cms/page/post-resume.blade.php` -> active route now uses `cms.page.career-center-exact-mirror`
- `resources/views/cms/page/privacy-policy-legal.blade.php` -> active route now uses `cms.page.privacy-policy-legal-mirror`
- `resources/views/cms/page/programs-match.blade.php` -> active route now uses `cms.page.programs-match-mirror`
- `resources/views/cms/page/resume-evaluation.blade.php` -> active route now uses `cms.page.career-center-exact-mirror`
- `resources/views/cms/page/us-charters.blade.php` -> active route now uses `cms.page.us-charters-mirror`
- `resources/views/cms/page/verify-a-certificate.blade.php` -> active route now uses `cms.page.verify-a-certificate-live`
- `resources/views/cms/page/view-job-seekers.blade.php` -> active route now uses `cms.page.career-center-exact-mirror`

Membership Mirror Replacements:
- `resources/views/cms/page/benefits-and-resources.blade.php` -> active route now uses `cms.page.membership-exact-mirror`
- `resources/views/cms/page/chartered-professional-membership.blade.php` -> active route now uses `cms.page.membership-exact-mirror`
- `resources/views/cms/page/chartered-supply-chain-professional-member.blade.php` -> active route now uses `cms.page.membership-exact-mirror`
- `resources/views/cms/page/corporate-membership.blade.php` -> active route now uses `cms.page.membership-exact-mirror`
- `resources/views/cms/page/digital-badges.blade.php` -> active route now uses `cms.page.membership-exact-mirror`
- `resources/views/cms/page/fellow-membership.blade.php` -> active route now uses `cms.page.membership-exact-mirror`
- `resources/views/cms/page/membership-faqs.blade.php` -> active route now uses `cms.page.membership-exact-mirror`
- `resources/views/cms/page/membership.blade.php` -> active route now uses `cms.page.membership-exact-mirror`
- `resources/views/cms/page/professional-member-criteria.blade.php` -> active route now uses `cms.page.membership-exact-mirror`
- `resources/views/cms/page/professional-membership-renewal.blade.php` -> active route now uses `cms.page.membership-exact-mirror`
- `resources/views/cms/page/professional-membership.blade.php` -> active route now uses `cms.page.membership-exact-mirror`
- `resources/views/cms/page/student-membership.blade.php` -> active route now uses `cms.page.membership-exact-mirror`
- `resources/views/cms/page/why-join-aapscm.blade.php` -> active route now uses `cms.page.membership-exact-mirror`

Training Mirror Replacements:
- `resources/views/cms/page/all-courses.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-blockchain-for-supply-chain-professional-ac-bscp.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-digital-merchandising-and-user-experience-professional-ac-dmux.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-digital-procurement-analytics-specialist-acdpas.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-digital-supply-chain-integration-professional-ac-dscip.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-e-commerce-strategy-and-growth-professional-ac-esgp.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-ethical-practices-amp-sustainable-e-commerce-professional-ac-seep.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-global-procurement-cross-border-supply-specialist-ac-gpcss.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-global-supply-chain-risk-and-resilience-manager-ac-gsrm.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-global-supply-chain-risk-and-resilience-professionalac-gsrp.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-it-procurement-digital-transformation-specialist-acipdts.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-procurement-automation-rpa-specialist-ac-paras.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-procurement-data-science-ai-specialist-ac-pdss.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-procurement-leadership-change-management-specialist-acplcms.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-procurement-professional-acpp.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-procurement-risk-management-specialist-ac-prms.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-public-sector-procurement-compliance-specialist-ac-pspcs.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-strategic-procurement-supplier-relationship-specialist-ac-sprs.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-supply-chain-cybersecurity-professional-ac-sccp.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-supply-chain-digital-transformation-manager-ac-scdtm.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-supplychain-professional-acscp.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-sustainable-and-circular-supply-chain-professional-ac-cscsp.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-sustainable-procurement-ethical-sourcing-professional-acspesp.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-american-certified-tourism-professional-actp.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-certified-contract-management-consultant-ccmc.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-certified-contract-manager-ccm.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-certified-contract-professional-ccp.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-chartered-advanced-supply-chain-cybersecurity-manager-ca-sccm.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-chartered-ai-driven-sustainable-procurement-manager-ca-ispm.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-chartered-e-commerce-data-analytics-and-ai-professional-ced-ai.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-chartered-global-cross-border-e-commerce-manager-cgcbe.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-chartered-procurement-manager-acpm.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-chartered-strategic-procurement-supplier-relationship-specialist-csp-srm.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-chartered-supply-chain-artificial-intelligence-analyst-csai.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-chartered-supply-chain-manager-acscm.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-chartered-sustainable-culinary-tourism-manager-csctm.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/aapscm-training-virtual-chartered-sustainable-supply-chain-manager-csscm.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/artificial-intelligence-ai-courses.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/become-a-authorized-training-partner.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/executive-diploma-in-ai-based-strategic-sourcing-negotiation-intelligence-ed-ssni-ai.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/executive-diploma-in-ai-driven-procurement-operations-automation-ed-poaai.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/executive-diploma-in-ai-driven-procurement-strategy-transformation-ed-aipst.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/executive-diploma-in-ai-integrated-contract-management-automation-ed-cmaai.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/executive-diploma-in-ai-powered-supplier-risk-compliance-esg-management-ed-srceai.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/learning-and-development-hub.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/online-courses.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/professional-development.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/seminars-courses.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/training-and-credentialing.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/training-school-affiliated.blade.php` -> active route now uses `cms.page.training-exact-mirror`
- `resources/views/cms/page/workshop-trainings.blade.php` -> active route now uses `cms.page.training-exact-mirror`

KEEP_ACTIVE_RUNTIME

Views kept in place because the current controller still routes directly to them:
- `resources/views/cms/page/become-a-partner.blade.php`
- `resources/views/cms/page/request-pdes-for-certificate.blade.php`
- certification category/detail views still mapped directly in `SLUG_VIEWS`, including `certifications.blade.php`, `certifications-faq.blade.php`, `certifications-for-professionals.blade.php`, `certification-process.blade.php`, `procurement-management-certifications.blade.php`, `supply-chain-management-certifications.blade.php`, `tourism-management-certifications.blade.php`, `e-commerce-certifications.blade.php`, `combined-procurement-logistics-and-supply-chain-certifications.blade.php`, `procurement-management.blade.php`, `supply-chain-management.blade.php`, and `which-certification-is-right-for-you.blade.php`
- mirror runtime views such as `training-exact-mirror.blade.php`, `membership-exact-mirror.blade.php`, `career-center-exact-mirror.blade.php`, `certification-exact-mirror.blade.php`, and all direct `*-mirror.blade.php` files
- seeders and payload files referenced by `database/seeders/DatabaseSeeder.php`
