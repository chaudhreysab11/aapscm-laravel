<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StorePdesCertificateRequest;
use App\Models\PdesCertificateRequest;
use Illuminate\Http\RedirectResponse;

class PdesCertificateRequestController extends Controller
{
    public function store(StorePdesCertificateRequest $request): RedirectResponse
    {
        $data = $request->validated();

        PdesCertificateRequest::create([
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'certification' => $data['certification'],
            'certification_number' => $data['certification_number'] ?: null,
            'activity_type' => $data['activity_type'],
            'course_name' => $data['course_name'],
            'provider' => $data['provider'],
            'location' => $data['location'],
            'course_date' => $data['course_date'],
            'pdes_earned' => $data['pdes_earned'],
            'category' => $data['category'],
            'certificate_path' => $request->file('certificate')?->store('pdes-requests/certificates', 'public'),
            'additional_documents_path' => $request->file('additional_docs')?->store('pdes-requests/additional-documents', 'public'),
            'declarations' => $data['declarations'],
            'status' => 'pending',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Your PDES request has been submitted successfully. Our certification team will review it and contact you if any additional information is needed.');
    }
}
