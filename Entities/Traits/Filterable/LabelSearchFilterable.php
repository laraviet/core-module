<?php

namespace Modules\Core\Entities\Traits\Filterable;

use Illuminate\Database\Query\Builder;

trait LabelSearchFilterable
{
    public function scopeSearch($query, $keyword)
    {
        return $query->key($keyword)->orWhere(function (Builder $query) use ($keyword) {
            $query->valueOf($keyword);
        });
    }
}
