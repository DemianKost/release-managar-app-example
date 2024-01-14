<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;

final class DashboardController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $data = [
            'projects' => auth()->user()->projects
        ];

        return Inertia::render(
            component: 'Dashboard',
            props: $data
        );
    }
}
