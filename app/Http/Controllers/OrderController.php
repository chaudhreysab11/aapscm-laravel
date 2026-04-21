<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function receipt(Request $request, Order $order): View
    {
        // Access is permitted in any of three ways:
        //  1. Signed URL (canonical, time-limited).
        //  2. The buyer is authenticated and owns the order.
        //  3. A guest whose session still holds the matching billing email.
        if (! $request->hasValidSignature() && ! Gate::allows('viewReceipt', $order)) {
            abort(403);
        }

        return view('cms.page.order-receipt', [
            'order' => $order->load('items.product'),
        ]);
    }
}
