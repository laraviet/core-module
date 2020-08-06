<?php

namespace Modules\Core\Repositories;

use Modules\Core\Entities\Permission;
use Modules\Core\Repositories\Contracts\PermissionRepositoryInterface;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    /**
     * UserRepository constructor.
     * @param Permission $permission
     */
    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }
}
