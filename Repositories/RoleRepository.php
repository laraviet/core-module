<?php

namespace Modules\Core\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\Contracts\RoleRepositoryInterface;
use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    /**
     * UserRepository constructor.
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes): Model
    {
        $role = parent::create(['name' => $attributes['name']]);
        $role->syncPermissions($attributes['permission']);

        return $role;
    }

    /**
     * @inheritDoc
     */
    public function updateById($id, array $attributes): Model
    {
        $role = parent::updateById($id, ['name' => $attributes['name']]);
        $role->syncPermissions($attributes['permission']);

        return $role;
    }


}
