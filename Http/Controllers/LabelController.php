<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Requests\CreateLabelRequest;
use Modules\Core\Http\Requests\UpdateLabelRequest;
use Modules\Core\Repositories\Contracts\LabelRepositoryInterface;

class LabelController extends Controller
{
    /**
     * @var LabelRepositoryInterface
     */
    private $labelRepository;

    /**
     * LabelController constructor.
     * @param LabelRepositoryInterface $labelRepository
     */
    public function __construct(LabelRepositoryInterface $labelRepository)
    {

        $this->labelRepository = $labelRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $labels = $this->genPagination($request, $this->labelRepository);

        return view('core::labels.index', compact('labels'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('core::labels.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateLabelRequest $request
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function store(CreateLabelRequest $request)
    {
        $this->labelRepository->create($request->all());

        return redirect()->route('labels.index')
            ->with(config('core.session_success'), __('core::labels.label') . ' ' . __('core::labels.create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $label = $this->labelRepository->findById($id);

        return view('core::labels.edit', compact('label'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateLabelRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function update(UpdateLabelRequest $request, $id)
    {
        $this->labelRepository->updateById($id, $request->all());

        return redirect()->route('labels.index')
            ->with(config('core.session_success'), __('core::labels.label') . ' ' . __('core::labels.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->labelRepository->deleteById($id);

        return redirect()->route('labels.index')
            ->with(config('core.session_success'), __('core::labels.label') . ' ' . __('core::labels.delete_success'));
    }
}
