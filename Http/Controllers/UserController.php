<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Modules\Core\Entities\User;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Requests\CreateUserRequest;
use Modules\Core\Repositories\Contracts\RoleRepositoryInterface;
use Modules\Core\Repositories\Contracts\UserRepositoryInterface;

class UserController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;
    /**
     * @var RoleRepositoryInterface
     */
    private $roleRepository;

    /**
     * UserController constructor.
     * @param UserRepositoryInterface $userRepository
     * @param RoleRepositoryInterface $roleRepository
     */
    public function __construct(UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    private function getRoles()
    {
        $roles = [];
        if (config('core.role_management')) {
            $roles = $this->roleRepository->toArray('name', 'name');
        }

        return $roles;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {

        $users = $this->genPagination($request, $this->userRepository);

        return view('core::users.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $roles = $this->getRoles();

        return view('core::users.create', compact('roles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUserRequest $request
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function store(CreateUserRequest $request)
    {

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = $this->userRepository->create($input);
        if (config('core.role_management')) {
            $user->assignRole([$input['role']]);
        } else {
            $user->assignRole([config('core.default_new_user_role')]);
        }

        return redirect()->route('users.index')
            ->with(config('core.session_success'), _t('user') . ' ' . _t('create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $user = $this->userRepository->findById($id);
        $roles = $this->getRoles();
        if (config('core.role_management')) {
            $user->role = $user->roles->pluck('name', 'name')->all();
        }

        return view('core::users.edit', compact('user', 'roles'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException|RepositoryException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'avatar'   => 'nullable',
            'role'     => 'nullable',
        ]);

        $input = $request->all();

        if ( ! empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }

        $user = $this->userRepository->updateById($id, $input);
        $this->uploadImage($user, $request, 'avatar', User::AVATAR_COLLECTION);
        if (config('core.role_management')) {
            $user->syncRoles([$input['role']]);
        }

        return redirect()->route('users.index')
            ->with(config('core.session_success'), _t('user') . ' ' . _t('update_success'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->userRepository->deleteById($id);

        return redirect()->route('users.index')
            ->with(config('core.session_success'), _t('user') . ' ' . _t('delete_success'));
    }
}
