<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Guards the Filament admin panel so that only users with the
 * 'admin' or 'staff' role can enter.
 *
 * Sits immediately after Filament's own Authenticate middleware so the
 * flow is:
 *   Unauthenticated  → Authenticate → redirect to login (302)
 *   Authenticated, no role match → EnsureAdminPanelAccess → abort 403
 *   Authenticated, admin/staff   → panel returned normally
 */
class EnsureAdminPanelAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        /** @var User|null $user */
        $user = Auth::user();

        if ($user !== null && ! $user->hasRole(['admin', 'staff'])) {
            abort(403);
        }

        return $next($request);
    }
}
