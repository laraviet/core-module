<?php

namespace Modules\Core\Repositories;

use Modules\Core\Entities\User;
use Modules\Core\Repositories\Contracts\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {

        $this->model = $user;
    }
}
