<?php

namespace Modules\Core\Repositories\Cache;

use Illuminate\Cache\CacheManager;
use Modules\Core\Repositories\Contracts\RoleRepositoryInterface;
use Modules\Core\Repositories\RoleRepository;
use Spatie\Permission\Models\Role;

class RoleCacheRepository extends BaseCacheRepository implements RoleRepositoryInterface
{
    /**
     * LabelRepository constructor.
     * @param Role $role
     * @param CacheManager $cache
     * @param RoleRepository $roleRepository
     */
    public function __construct(Role $role, CacheManager $cache, RoleRepository $roleRepository)
    {
        $this->model = $role;
        $this->cache = $cache;
        parent::__construct($roleRepository);
    }
}
