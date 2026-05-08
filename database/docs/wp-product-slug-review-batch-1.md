# WP Product Slug Review Batch 1

Source: [wp-product-slug-map.csv](wp-product-slug-map.csv)

This batch is for review only. It does not import products, prices, users, orders, or CMS pages.

## Group Summary

| status | confidence | source_of_slug | rows |
|---|---:|---|---:|
| confirmed | high | database/seeders/CommerceConfirmedProductsSeeder.php:source_id | 3 |
| needs_review | low | (blank) | 188 |
| needs_review | medium | database/docs/wp-commerce-mapping/products.csv:wp_slug | 207 |

## Batch 1 Candidates

Candidate filter: `proposed_slug` is present and `status=needs_review`.

| # | wp_product_id | wp_product_name | proposed_slug | source_of_slug | confidence | recommended action |
|---:|---:|---|---|---|---|---|
| 1 | 4231 | Certified Professional/Manager Membership Fee | manager-membership | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 2 | 5589 | American Certified Procurement Professional (ACPP)® | american-certified-procurement-professional-acpp | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 3 | 5590 | Chartered Procurement Manager  (CPM)® | american-certified-procurement-manager-acpm | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | needs manual check |
| 4 | 5591 | The American Certified Supply Chain Professional (ACSCP)® | the-american-certified-supply-chain-professional-acscp | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 5 | 5593 | Chartered Supply Chain Manager (ACSCM)® | the-american-certified-supply-chain-manager-acscm | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | needs manual check |
| 6 | 5595 | The American Certified Tourism Professional (ACTP)® | the-american-certified-tourism-professional-actp | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 7 | 6509 | Membership Service Fee | membership-service | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 8 | 6857 | Procurement Project Management Success | procurement-project-management-success | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 9 | 7360 | Model Contract Terms and Conditions with Annotations and Case Summaries | model-contract-terms-and-conditions-with-annotations-and-case-summaries | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 10 | 7362 | Essentials of Inventory Management | essentials-of-inventory-management | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 11 | 7364 | Sale! A Practical Guide to Transportation and Logistics, Third Edition | sale-a-practical-guide-to-transportation-and-logistics-third-edition | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | needs manual check |
| 12 | 7382 | New! Transportation - A Supply Chain Perspective | new-transportation-a-supply-chain-perspective | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | needs manual check |
| 13 | 7384 | World-Class Warehousing and Material Handling, 2nd Edition | world-class-warehousing-and-material-handling-2nd-edition | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 14 | 7387 | New! Inventory Strategy | new-inventory-strategy | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | needs manual check |
| 15 | 7392 | Green Purchasing and Sustainability | green-purchasing-and-sustainability | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 16 | 7394 | Managing Indirect Spend | managing-indirect-spend | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 17 | 7396 | Purchase Order Management, Best Practices | purchase-order-management-best-practices | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 18 | 7398 | Supplier Evaluation and Performance Excellence | supplier-evaluation-and-performance-excellence | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 19 | 7400 | Spend Analysis - The Window into Strategic Sourcing | spend-analysis-the-window-into-strategic-sourcing | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 20 | 7402 | The Newly Revised Purchasing Law Study Pack | the-newly-revised-purchasing-law-study-pack | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 21 | 7404 | Sale! Supply Management and Procurement - From Basics to Best-in-Class | sale-supply-management-and-procurement-from-basics-to-best-in-class | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | needs manual check |
| 22 | 7406 | You're the Buyer-You Negotiate It! | youre-the-buyer-you-negotiate-it | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 23 | 7408 | Essentials of Supply Chain Management Third Edition | essentials-of-supply-chain-management-third-edition | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 24 | 7410 | Supply Chain As Strategic Asset - The Key to Reaching Business Goals | supply-chain-as-strategic-asset-the-key-to-reaching-business-goals | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 25 | 7412 | Single Point of Failure - The Ten Essential Laws of Supply Chain Risk Management | single-point-of-failure-the-ten-essential-laws-of-supply-chain-risk-management | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 26 | 7414 | How To Anaylze And Negotiate Warranties For Goods And Services | how-to-anaylze-and-negotiate-warranties-for-goods-and-services | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 27 | 7418 | Sale! Supply Chain Management Best Practices Third Edition | sale-supply-chain-management-best-practices-third-edition | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | needs manual check |
| 28 | 7769 | Chartered Supply Chain Artiﬁcial Intelligence Analyst (CSAI)® | american-certified-supply-chain-artificial-intelligence-analyst-acsai | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 29 | 7774 | American Certified Supply Chain Technology Managers (CSCT)® | american-certified-supply-chain-technology-managers-acsct | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 30 | 11905 | Chartered Healthcare Procurement Solutions Professional (CHPP)® | chartered-healthcare-procurement-solutions-professional-chpp | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 31 | 12326 | Become a Fellow Member | become-a-fellow-member | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 32 | 17649 | ACSCT® Preparation Workshop and Exam Fee | acsct-preparation-workshop-and-exam-fee | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 33 | 17662 | Chartered Supply Chain Artiﬁcial Intelligence Analyst (CSAI)® | acsai-preparation-workshop-and-exam-fee | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 34 | 17818 | ACPP® Preparation Workshop and Exam Fee | acpp-preparation-workshop-and-exam-fee | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 35 | 17888 | Chartered Procurement Manager (CPM)® | acpm-preparation-workshop-and-exam-fee | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | needs manual check |
| 36 | 17935 | ACSCP® Preparation Workshop and Exam Fee | acscp-preparation-workshop-and-exam-fee | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 37 | 17943 | ACSCM® Preparation Workshop and Exam Fee | acscm-preparation-workshop-and-exam-fee | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 38 | 19447 | Professional Membership Fee | professional-membership-fee | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 39 | 19453 | CHARTERED PROFESSIONAL MEMBERSHIP | chartered-professional-membership | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 40 | 19726 | AAPSCM® Training Virtual - American Certified Procurement Professional (ACPP)® | aapscm-training-virtual-american-certified-procurement-professional-acpp | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 41 | 19733 | AAPSCM® Training Virtual - Chartered Procurement Manager (CPM)® | aapscm-training-virtual-chartered-procurement-manager-cpm | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 42 | 19741 | AAPSCM® Training Virtual -American Certified Supply-Chain Professional (ACSCP)® | aapscm-training-virtual-american-certified-supply-chain-professional-acscp | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 43 | 19747 | AAPSCM® Training Virtual - Chartered Supply Chain Manager (CSCM)® | aapscm-training-virtual-chartered-supply-chain-manager-cscm | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 44 | 19753 | AAPSCM® Training Virtual - American Certified Tourism Professional (ACTP)® | aapscm-training-virtual-american-certified-tourism-professional-actp | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 45 | 19762 | AAPSCM® Training Virtual -American Certified Digital Procurement & Analytics Specialist (AC-DPA)® | aapscm-training-virtual-american-certified-digital-procurement-analytics-specialist-acdpas | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 46 | 19777 | AAPSCM® Training Virtual - Chartered Supply Chain Technology Manager(CSCT)® | aapscm-training-virtual-chartered-supply-chain-technology-managercsct | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 47 | 19802 | AAPSCM® Training Virtual -American Certified Sustainable Procurement & Ethical Sourcing Professional (AC-SGPES)® | american-certified-sustainable-procurement-ethical-sourcing-professional-ac-spesp | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 48 | 19817 | AAPSCM® Training Virtual - American Certified Procurement Risk Management Specialist (AC-PRM)® | american-certified-procurement-risk-management-specialist-ac-prms | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 49 | 19826 | AAPSCM® Training Virtual - American Certified Strategic Procurement & Supplier Relationship Specialist (AC-SPR)® | american-certified-strategic-procurement-supplier-relationship-specialist-ac-sprs | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | approve |
| 50 | 19835 | AAPSCM® Training Virtual - Chartered Supply Chain Artiﬁcial Intelligence Analyst (CSAI)® | aapscm-training-virtual-chartered-supply-chain-arti%ef%ac%81cial-intelligence-analyst-csai | database/docs/wp-commerce-mapping/products.csv:wp_slug | medium | needs manual check |

## Batch Status

- Candidate rows total: 207
- Rows included in batch 1: 50
- Candidate rows remaining after batch 1: 157

## Obvious Duplicate Or Suspicious Slugs

### Suspicious Slugs

| wp_product_id | wp_product_name | proposed_slug | reason |
|---:|---|---|---|
| 5590 | Chartered Procurement Manager  (CPM)® | american-certified-procurement-manager-acpm | Product name uses CPM, but slug contains ACPM. |
| 5593 | Chartered Supply Chain Manager (ACSCM)® | the-american-certified-supply-chain-manager-acscm | Product name says Chartered, but slug says American Certified. |
| 7364 | Sale! A Practical Guide to Transportation and Logistics, Third Edition | sale-a-practical-guide-to-transportation-and-logistics-third-edition | Slug includes merchandising prefix that may not be canonical. |
| 7382 | New! Transportation - A Supply Chain Perspective | new-transportation-a-supply-chain-perspective | Slug includes merchandising prefix that may not be canonical. |
| 7387 | New! Inventory Strategy | new-inventory-strategy | Slug includes merchandising prefix that may not be canonical. |
| 7404 | Sale! Supply Management and Procurement - From Basics to Best-in-Class | sale-supply-management-and-procurement-from-basics-to-best-in-class | Slug includes merchandising prefix that may not be canonical. |
| 7418 | Sale! Supply Chain Management Best Practices Third Edition | sale-supply-chain-management-best-practices-third-edition | Slug includes merchandising prefix that may not be canonical. |
| 17888 | Chartered Procurement Manager (CPM)® | acpm-preparation-workshop-and-exam-fee | Product name uses CPM, but slug contains ACPM. |
| 19835 | AAPSCM® Training Virtual - Chartered Supply Chain Artiﬁcial Intelligence Analyst (CSAI)® | aapscm-training-virtual-chartered-supply-chain-arti%ef%ac%81cial-intelligence-analyst-csai | Slug contains characters outside lowercase letters, numbers, and hyphens. |
| 20377 | Chartered Supply Chain Artiﬁcial Intelligence Analyst (CSAI)® Authorized On-demand Self-Paced Exam Prep - (Members) | chartered-supply-chain-arti%ef%ac%81cial-intelligence-analyst-csai-authorized-on-demand-self-paced-exam-prep | Slug contains characters outside lowercase letters, numbers, and hyphens. |
| 20383 | Chartered Supply Chain Artiﬁcial Intelligence Analyst (CSAI)® Authorized On-demand Self-Paced Exam Prep - (Non-Members) | chartered-supply-chain-arti%ef%ac%81cial-intelligence-analyst-csai-authorized-on-demand-self-paced-exam-prep-non-member | Slug contains characters outside lowercase letters, numbers, and hyphens. |
| 33877 | AAPSCM® Training Virtual - American Certified Procurement Professional (ACPP)® (Copy) | aapscm-training-virtual-american-certified-procurement-professional-acpp-copy | Copy/duplicate product naming needs canonical review. |
