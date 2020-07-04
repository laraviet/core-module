<?php

namespace Modules\Core\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Repositories\Contracts\UserRepositoryInterface;

class UserController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserController constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
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
        return view('core::users.create');
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
        $user->assignRole([config('role.default_new_user_role')]);

        return redirect()->route('users.index')
            ->with(config('core.session_success'), __('core::labels.user') . ' ' . __('core::labels.create_success'));
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

        return view('core::users.edit', compact('user'));
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
        ]);


        $input = $request->all();

        if ( ! empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }

        $this->userRepository->updateById($id, $input);

        return redirect()->route('users.index')
            ->with(config('core.session_success'), __('core::labels.user') . ' ' . __('core::labels.update_success'));
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
            ->with(config('core.session_success'), __('core::labels.user') . ' ' . __('core::labels.delete_success'));
    }
}
