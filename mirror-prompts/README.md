Mirror prompt pack for converting already-implemented Laravel pages to high-fidelity live WordPress mirrors.

Use the category prompt that matches the CSV in public_url_inventory_by_category.

Files:
- certification-mirror.prompt.md
- training-mirror.prompt.md
- membership-mirror.prompt.md
- cms-mirror.prompt.md
- exam-mirror.prompt.md
- career-center-mirror.prompt.md
- forms-mirror.prompt.md
- commerce-mirror.prompt.md

All prompts assume:
- Source live pages are on https://aapscm.org.
- Existing Laravel routes and slugs must stay unchanged.
- Pages already exist, so this is a conversion job, not a new-page build.
- The existing mirror workflow should be reused: exact-mirror payload generation, ExactMirrorPageSeeder, exact-mirror Blade wrapper, local asset download, local URL rewriting, and validation.