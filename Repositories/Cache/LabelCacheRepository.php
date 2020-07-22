<?php

namespace Modules\Core\Repositories\Cache;

use Illuminate\Cache\CacheManager;
use Modules\Core\Entities\Label;
use Modules\Core\Repositories\Contracts\LabelRepositoryInterface;
use Modules\Core\Repositories\LabelRepository;

class LabelCacheRepository extends BaseCacheRepository implements LabelRepositoryInterface
{
    /**
     * LabelRepository constructor.
     * @param Label $label
     * @param CacheManager $cache
     * @param LabelRepository $labelRepository
     */
    public function __construct(Label $label, CacheManager $cache, LabelRepository $labelRepository)
    {
        $this->model = $label;
        $this->cache = $cache;
        parent::__construct($labelRepository);
    }
}
