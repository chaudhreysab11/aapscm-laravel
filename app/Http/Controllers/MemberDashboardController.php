<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\MemberDashboardService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemberDashboardController extends Controller
{
    public function __construct(private MemberDashboardService $dashboard) {}

    public function overview(Request $request): View
    {
        return $this->render($request, 'member.dashboard', 'overview');
    }

    public function membership(Request $request): View
    {
        return $this->render($request, 'member.membership', 'membership');
    }

    public function orders(Request $request): View
    {
        return $this->render($request, 'member.orders', 'orders');
    }

    public function profile(Request $request): View
    {
        return $this->render($request, 'member.profile', 'profile');
    }

    public function training(Request $request): View
    {
        return $this->render($request, 'member.training', 'training');
    }

    private function render(Request $request, string $view, string $activeSection): View
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        return view($view, array_merge(
            $this->dashboard->build($user),
            ['activeSection' => $activeSection],
        ));
    }
}
