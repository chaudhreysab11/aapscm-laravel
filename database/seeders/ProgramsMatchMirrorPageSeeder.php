<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class ProgramsMatchMirrorPageSeeder extends ExactMirrorPageSeeder
{
    protected function transformPageData(array $pageData): array
    {
    $pageData['inline_css'] = <<<'CSS'
.Combine-Procurement-Certification-PM th { background: rgb(219, 37, 33); color: rgb(255, 255, 255); font-family: Poppins; }
.Combine-Procurement-Certification-PM .column-1 { width: 40%; font-family: Poppins; padding-left: 20px; place-content: center; font-weight: 450; }
.Combine-Procurement-Certification-PM .column-2 { width: 44%; font-family: Poppins; padding-left: 20px; place-content: center; font-weight: 400; }
.Combine-Procurement-Certification-PM .column-3 { font-family: Poppins; padding-left: 20px; place-content: center; font-weight: 400; }
.Combine-Procurement-Certification-PM tr:nth-child(2n) { background-color: rgba(219, 37, 33, 0.2); z-index: 1; }
.Combine-Procurement-Certification-PM-BTN { padding: 10px 18px; border-radius: 20px; color: rgb(0, 0, 0); transition: 0.2s ease-out; }
.Combine-Procurement-Certification-PM-BTN:hover { color: rgb(219, 37, 33); }
.Procurement-Certification-PM th { background: darkslategray; color: rgb(255, 255, 255); font-family: Poppins; }
.Procurement-Certification-PM .column-1 { width: 40%; font-family: Poppins; padding-left: 20px; place-content: center; font-weight: 450; }
.Procurement-Certification-PM .column-2 { width: 44%; font-family: Poppins; padding-left: 20px; place-content: center; font-weight: 400; }
.Procurement-Certification-PM .column-3 { font-family: Poppins; padding-left: 20px; place-content: center; font-weight: 400; }
.Procurement-Certification-PM tr:nth-child(2n) { background-color: rgba(47, 79, 79, 0.2); z-index: 1; }
.Procurement-Certification-PM-BTN { padding: 10px 18px; border-radius: 20px; transition: 0.2s ease-in; }
.Procurement-Certification-PM-BTN:hover { color: darkslategray; }
.Supply-Chain-Management-PM th { background: darkslateblue; color: rgb(255, 255, 255); font-family: Poppins; }
.Supply-Chain-Management-PM .column-1 { width: 40%; font-family: Poppins; padding-left: 20px; place-content: center; font-weight: 450; }
.Supply-Chain-Management-PM .column-2 { width: 44%; font-family: Poppins; padding-left: 20px; place-content: center; font-weight: 400; }
.Supply-Chain-Management-PM .column-3 { font-family: Poppins; padding-left: 20px; place-content: center; font-weight: 400; }
.Supply-Chain-Management-PM tr:nth-child(2n) { background-color: rgba(72, 61, 139, 0.2); z-index: 1; }
.Supply-Chain-Management-PM-BTN { padding: 10px 18px; border-radius: 20px; color: rgb(0, 0, 0); transition: 0.2s ease-in; background: rgba(72, 61, 139, 0.3); }
.Supply-Chain-Management-PM-BTN:hover { background: rgb(72, 61, 139); color: darkslateblue; }
.Tourism-Management-PM th { background: darkgreen; color: rgb(255, 255, 255); font-family: Poppins; }
.Tourism-Management-PM .column-1 { width: 40%; font-family: Poppins; padding-left: 20px; place-content: center; font-weight: 450; }
.Tourism-Management-PM .column-2 { width: 44%; font-family: Poppins; padding-left: 20px; place-content: center; font-weight: 400; }
.Tourism-Management-PM .column-3 { font-family: Poppins; padding-left: 20px; place-content: center; font-weight: 400; }
.Tourism-Management-PM tr:nth-child(2n) { background-color: rgba(0, 100, 0, 0.2); z-index: 1; }
.Tourism-Management-PM-BTN { padding: 10px 18px; border-radius: 20px; color: rgb(0, 0, 0); transition: 0.2s ease-in; background: rgba(0, 100, 0, 0.3); }
.Tourism-Management-PM-BTN:hover { background: rgb(0, 100, 0); color: darkgreen; }
.E-Commerce-Management th { background: rgb(247, 198, 0); color: rgb(255, 255, 255); font-family: Poppins; }
.E-Commerce-Management .column-1 { width: 40%; font-family: Poppins; padding-left: 20px; place-content: center; font-weight: 450; }
.E-Commerce-Management .column-2 { width: 44%; font-family: Poppins; padding-left: 20px; place-content: center; font-weight: 400; }
.E-Commerce-Management .column-3 { font-family: Poppins; padding-left: 20px; place-content: center; font-weight: 400; }
.E-Commerce-Management tr:nth-child(2n) { background-color: rgba(247, 198, 0, 0.2); z-index: 1; }
.E-Commerce-Management-BTN { padding: 10px 18px; border-radius: 20px; color: rgb(0, 0, 0); transition: 0.2s ease-in; background: rgba(247, 198, 0, 0.3); }
.E-Commerce-Management-BTN:hover { background: rgb(247, 198, 0); color: rgb(247, 198, 0); }
@media only screen and (max-width: 767px) and (min-width: 319px) {
    .Supply-Chain-Management-PM-BTN { border-radius: 20px; color: rgb(0, 0, 0); padding: 10px 0px !important; background: none !important; }
    .Tourism-Management-PM-BTN { border-radius: 20px; color: rgb(0, 0, 0); padding: 10px 0px !important; background: none !important; }
    .Procurement-Certification-PM-BTN { border-radius: 20px; color: rgb(0, 0, 0); padding: 10px 0px !important; background: none !important; }
    .E-Commerce-Management-BTN { border-radius: 20px; color: rgb(0, 0, 0); padding: 10px 0px !important; background: none !important; }
}
@media (min-width: 768px) {
    .Supply-Chain-Management-PM-BTN { border-radius: 20px; color: rgb(0, 0, 0); padding: 10px 0px !important; background: none !important; }
    .E-Commerce-Management-BTN { border-radius: 20px; color: rgb(0, 0, 0); padding: 10px 0px !important; background: none !important; }
    .Tourism-Management-PM-BTN { border-radius: 20px; color: rgb(0, 0, 0); padding: 10px 0px !important; background: none !important; }
    .Procurement-Certification-PM-BTN { border-radius: 20px; color: rgb(0, 0, 0); padding: 10px 0px !important; background: none !important; }
}
CSS;

        return $pageData;
    }

    protected function slug(): string
    {
        return 'programs-match';
    }

    protected function payloadFile(): string
    {
        return 'programs-match_data.php';
    }
}