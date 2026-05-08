<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\CertificationAwarded;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class VerifyCertificateController extends Controller
{
    public function lookup(Request $request): View
    {
        $page = Page::with('seoMeta')->published()->where('slug', 'verify-a-certificate')->first();
        if ($page === null) {
            throw new NotFoundHttpException('Page not found: verify-a-certificate');
        }

        $data = $request->validate([
            'first_name' => ['nullable', 'string', 'max:120'],
            'last_name' => ['nullable', 'string', 'max:120'],
            'certificate_number' => ['required', 'string', 'max:120'],
        ]);

        $query = CertificationAwarded::query()
            ->with(['user', 'catalogEntry'])
            ->where('certificate_number', $data['certificate_number']);

        if (! empty($data['first_name'])) {
            $query->whereHas('user', fn ($q) => $q->where('first_name', 'LIKE', $data['first_name'] . '%'));
        }
        if (! empty($data['last_name'])) {
            $query->whereHas('user', fn ($q) => $q->where('last_name', 'LIKE', $data['last_name'] . '%'));
        }

        $awarded = $query->first();

        return view('cms.page.verify-a-certificate-live', [
            'page' => $page,
            'ctaProduct' => null,
            'submitted' => true,
            'awarded' => $awarded,
            'submittedValues' => $data,
        ]);
    }
}
