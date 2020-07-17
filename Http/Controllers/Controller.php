<?php

namespace Modules\Core\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Carbon\Carbon;
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

        $filter = [];
        $from = Carbon::parse('1900-01-01');
        $to = Carbon::parse('2099-01-01');
        if ($request->has('from') || $request->has('to')) {
            if ($request->has('from')) {
                $from = Carbon::parse($request->get('from'));
            }
            if ($request->has('to')) {
                $to = Carbon::parse($request->get('to'));
            }
            $filter = [
                'timeStart' => compact('from', 'to')
            ];
        }

        /** @var LengthAwarePaginator $services */
        return $repository->transformPaginate($repository->advancedPaginate(
            array_merge($filter, $request->get('filter', [])),
            $request->get('sort', []),
            $request->get(config('core.page_name'), 1),
            $request->get(config('core.per_page_name'), config('pagination.per_page_number'))
        ));
    }

    protected function sortAscById(Request $request): void
    {
        $request->attributes->set('sort', ['id' => 'asc']);
    }
}
