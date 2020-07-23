<?php

namespace Modules\Core\Repositories\Cache;

use Illuminate\Cache\CacheManager;
use Modules\Core\Entities\User;
use Modules\Core\Repositories\Contracts\UserRepositoryInterface;
use Modules\Core\Repositories\UserRepository;

class UserCacheRepository extends BaseCacheRepository implements UserRepositoryInterface
{
    /**
     * LabelRepository constructor.
     * @param User $user
     * @param CacheManager $cache
     * @param UserRepository $userRepository
     */
    public function __construct(User $user, CacheManager $cache, UserRepository $userRepository)
    {
        $this->model = $user;
        $this->cache = $cache;
        parent::__construct($userRepository);
    }
}
