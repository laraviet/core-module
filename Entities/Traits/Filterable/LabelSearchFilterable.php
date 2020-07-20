<?php

namespace Modules\Core\Entities\Traits\Filterable;

trait LabelSearchFilterable
{
    public function scopeSearch($query, $keyword)
    {
        return $query->key($keyword);
    }
}
