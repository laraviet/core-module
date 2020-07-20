<?php

namespace Modules\Core\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Modules\Core\Entities\Label;
use Modules\Core\Repositories\Contracts\LabelRepositoryInterface;

class LabelRepository extends BaseRepository implements LabelRepositoryInterface
{
    /**
     * LabelRepository constructor.
     * @param Label $label
     */
    public function __construct(Label $label)
    {
        $this->model = $label;
    }

    /**
     * @inheritDoc
     */
    public function update(Model $model, array $attributes): Model
    {
        $key = $attributes["key"];
        Cache::tags("label.{$key}")->flush();

        return parent::update($model, $attributes);
    }

    /**
     * @inheritDoc
     */
    public function delete(Model $model): void
    {
        $key = $model->key;
        Cache::tags("label.{$key}")->flush();
        parent::delete($model);
    }
}
