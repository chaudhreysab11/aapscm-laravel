<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function receipt(Request $request, Order $order): View
    {
        return $this->renderDocument($request, $order, 'receipt');
    }

    public function invoice(Request $request, Order $order): View
    {
        return $this->renderDocument($request, $order, 'invoice');
    }

    public function invoicePdf(Request $request, Order $order): Response
    {
        $this->authorizeDocument($request, $order);
        $this->ensureInvoicePdfEligible($order);

        $documentData = $this->documentViewData($request, $order);

        return Pdf::loadView('cms.page.pdf.order-invoice', $documentData)
            ->setPaper('a4')
            ->download($this->invoiceFilename($order));
    }

    private function renderDocument(Request $request, Order $order, string $documentType): View
    {
        $this->authorizeDocument($request, $order);

        return view('cms.page.order-' . $documentType, $this->documentViewData($request, $order));
    }

    private function authorizeDocument(Request $request, Order $order): void
    {
        if (! $request->hasValidSignature() && ! Gate::allows('viewReceipt', $order)) {
            abort(403);
        }
    }

    /** @return array<string, string|null> */
    private function billingDetails(Order $order): array
    {
        $notes = json_decode((string) $order->notes, true);
        $notes = is_array($notes) ? $notes : [];

        return [
            'name' => $order->billing_name,
            'email' => $order->billing_email,
            'company' => $this->stringOrNull($notes['billing_company'] ?? null),
            'address' => $this->stringOrNull($notes['billing_address'] ?? null),
            'address_line_2' => $this->stringOrNull($notes['billing_address_line_2'] ?? null),
            'city' => $this->stringOrNull($notes['billing_city'] ?? null),
            'state' => $this->stringOrNull($notes['billing_state'] ?? null),
            'postcode' => $this->stringOrNull($notes['billing_postcode'] ?? null),
            'country' => $this->stringOrNull($notes['billing_country'] ?? null),
            'phone' => $this->stringOrNull($notes['billing_phone'] ?? null),
            'customer_note' => $this->stringOrNull($notes['customer_note'] ?? null),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function documentViewData(Request $request, Order $order): array
    {
        $order->load('items.product');
        $notes = json_decode((string) $order->notes, true);
        $notes = is_array($notes) ? $notes : [];

        return [
            'order' => $order,
            'billingDetails' => $this->billingDetails($order),
            'accountCreationNotice' => $this->accountCreationNotice($notes),
            'receiptUrl' => $this->documentUrl($request, 'order.receipt', $order),
            'invoiceUrl' => $this->documentUrl($request, 'order.invoice', $order),
            'invoicePdfUrl' => $this->canGenerateInvoicePdf($order)
                ? $this->documentUrl($request, 'order.invoice.pdf', $order)
                : null,
        ];
    }

    private function accountCreationNotice(array $notes): ?string
    {
        $resolution = $notes['account_resolution'] ?? null;

        if (! is_array($resolution)) {
            return null;
        }

        if (($resolution['status'] ?? null) !== 'created_new_user') {
            return null;
        }

        $email = $this->stringOrNull($resolution['user_email'] ?? null);

        if (($resolution['password_setup_dispatched'] ?? false) !== true) {
            return $email === null
                ? 'Your AAPSCM account has been created. Use the Forgot Password form to set your password if the setup email does not arrive.'
                : "Your AAPSCM account has been created. Use Forgot Password with {$email} if the password setup email does not arrive.";
        }

        return $email === null
            ? 'Your AAPSCM account has been created. Check your email for the password setup link.'
            : "Your AAPSCM account has been created. Check {$email} for the password setup link.";
    }

    private function documentUrl(Request $request, string $routeName, Order $order): string
    {
        if (auth()->check()) {
            return route($routeName, ['order' => $order->id]);
        }

        if ($request->hasValidSignature()) {
            return URL::temporarySignedRoute($routeName, now()->addDays(7), ['order' => $order->id]);
        }

        return route($routeName, ['order' => $order->id]);
    }

    private function canGenerateInvoicePdf(Order $order): bool
    {
        return $order->payment_status === 'paid' && $order->status === 'completed';
    }

    private function ensureInvoicePdfEligible(Order $order): void
    {
        if (! $this->canGenerateInvoicePdf($order)) {
            abort(404);
        }
    }

    private function invoiceFilename(Order $order): string
    {
        return 'invoice-' . strtolower($order->order_number) . '.pdf';
    }

    private function stringOrNull(mixed $value): ?string
    {
        if (! is_string($value)) {
            return null;
        }

        $trimmed = trim($value);

        return $trimmed === '' ? null : $trimmed;
    }
}
