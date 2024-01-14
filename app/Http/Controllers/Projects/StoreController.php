<?php

declare(strict_types=1);

namespace App\Http\Controllers\Projects;

use App\Http\Requests\Projects\StoreRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

final class StoreController
{
    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        Project::query()
            ->create(
                attributes: array_merge( $request->validated(), [
                    'user_id' => auth()->id()
                ]),
            );
        
        return Redirect::route(
            route: 'dashboard'
        );
    }
}
