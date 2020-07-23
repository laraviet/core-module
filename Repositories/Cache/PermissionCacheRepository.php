<?php

namespace Modules\Core\Repositories\Cache;

use Illuminate\Cache\CacheManager;
use Modules\Core\Repositories\Contracts\PermissionRepositoryInterface;
use Modules\Core\Repositories\PermissionRepository;
use Spatie\Permission\Models\Permission;

class PermissionCacheRepository extends BaseCacheRepository implements PermissionRepositoryInterface
{
    /**
     * LabelRepository constructor.
     * @param Permission $permission
     * @param CacheManager $cache
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(Permission $permission, CacheManager $cache, PermissionRepository $permissionRepository)
    {
        $this->model = $permission;
        $this->cache = $cache;
        parent::__construct($permissionRepository);
    }
}
