<?php

namespace App\Http\Controllers;

use App\Models\CertificationCatalog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CertificationController extends Controller
{
    public function index(Request $request): View
    {
        $credentialTypes = CertificationCatalog::active()
            ->whereNotNull('credential_type')
            ->distinct()
            ->orderBy('credential_type')
            ->pluck('credential_type');

        $query = CertificationCatalog::active()->ordered();

        $activeType = $request->query('type');
        if ($activeType) {
            $query->byCredentialType($activeType);
        }

        $certifications = $query->paginate(24)->withQueryString();

        return view('certifications.index', compact('certifications', 'credentialTypes', 'activeType'));
    }

    public function show(CertificationCatalog $certification): View
    {
        $certification->load([
            'products' => fn ($q) => $q
                ->where('type', 'exam_voucher')
                ->where('is_active', true)
                ->with('prices'),
        ]);

        $examVouchers = $certification->products;

        return view('certifications.show', compact('certification', 'examVouchers'));
    }
}
