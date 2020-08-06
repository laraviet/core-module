<?php

namespace Modules\Core\Http\Controllers;

use DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Requests\CreateRoleRequest;
use Modules\Core\Http\Requests\UpdateRoleRequest;
use Modules\Core\Repositories\Contracts\PermissionRepositoryInterface;
use Modules\Core\Repositories\Contracts\RoleRepositoryInterface;


class RoleController extends Controller
{
    /**
     * @var RoleRepositoryInterface
     */
    private $roleRepository;
    /**
     * @var PermissionRepositoryInterface
     */
    private $permissionRepository;

    /**
     * Display a listing of the resource.
     * @param RoleRepositoryInterface $roleRepository
     * @param PermissionRepositoryInterface $permissionRepository
     */
    function __construct(RoleRepositoryInterface $roleRepository, PermissionRepositoryInterface $permissionRepository)
    {
        $this->middleware('permission:role-list');
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|Response|View
     */
    public function index(Request $request)
    {
        $roles = $this->genPagination($request, $this->roleRepository);

        return view('core::roles.index', compact('roles'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $permission = $this->permissionRepository->all();

        return view('core::roles.create', compact('permission'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRoleRequest $request
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function store(CreateRoleRequest $request)
    {
        $this->roleRepository->create($request->except('_token'));

        return redirect()->route('roles.index')
            ->with(config('core.session_success'), _t('role') . ' ' . _t('create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|Response|View
     */
    public function edit($id)
    {
        $role = $this->roleRepository->findById($id);
        $permission = $this->permissionRepository->all();
        $db = config('core.saas_enable') ? DB::connection('tenant')->table("role_has_permissions") : DB::table("role_has_permissions");
        $rolePermissions = $db->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        foreach ($permission as $item) {
            $item->checked = in_array($item->id, $rolePermissions);
        }


        return view('core::roles.edit', compact('role', 'permission'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoleRequest $request
     * @param int $id
     * @return RedirectResponse|Response
     * @throws RepositoryException
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $this->roleRepository->updateById($id, $request->except(['_token', 'method']));

        return redirect()->route('roles.index')
            ->with(config('core.session_success'), _t('role') . ' ' . _t('update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|Response
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->roleRepository->deleteById($id);

        return redirect()->route('roles.index')
            ->with(config('core.session_success'), _t('role') . ' ' . _t('delete_success'));
    }
}
