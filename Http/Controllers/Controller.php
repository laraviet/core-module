<?php

namespace Modules\Core\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Modules\Core\Repositories\Contracts\BaseRepositoryInterface;

class Controller extends BaseController
{
    /**
     * @param Request $request
     * @param BaseRepositoryInterface $repository
     * @return LengthAwarePaginator|Collection
     */
    protected function genPagination(Request $request, BaseRepositoryInterface $repository)
    {
        $eagerLoad = $request->get('load', []);
        $repository->with($eagerLoad);

        if ($request->get('all')) {
            return $repository->all();
        }

        /** @var LengthAwarePaginator $services */
        return $repository->advancedPaginate(
            $request->get('filter', []),
            $request->get('sort', []),
            $request->get(config('core.page_name'), 1),
            $request->get(config('core.per_page_name'), config('pagination.per_page_number'))
        );
    }
}
