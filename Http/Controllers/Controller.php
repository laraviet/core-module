<?php

namespace Modules\Core\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\Core\Repositories\Contracts\BaseRepositoryInterface;

class Controller extends BaseController
{
    /**
     * @var
     */
    protected $defaultEagerLoad = [];

    /**
     * @param Request $request
     * @param BaseRepositoryInterface $repository
     * @return LengthAwarePaginator|Collection
     */
    protected function genPagination(Request $request, BaseRepositoryInterface $repository)
    {
        $eagerLoad = $request->get('load', []);
        $eagerLoad = array_merge($this->defaultEagerLoad, $eagerLoad);

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

    protected function removeIfZero(Request $request, $key)
    {
        if ($request->get($key) == 0) {
            return $request->request->remove($key);
        }
    }

    protected function sortAscById(Request $request): void
    {
        $request->attributes->set('sort', ['id' => 'asc']);
    }

    protected function uploadImage(Model $model, Request $request, $field, $collection = null)
    {
        if ($request->hasFile($field)) {
            $model->clearMediaCollection($collection);
            $model->addMediaFromRequest($field)->toMediaCollection($collection);
        }
    }
}
