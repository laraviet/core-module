<?php

namespace Modules\Core\Entities\Traits\Filterable;

use Illuminate\Database\Eloquent\Builder;

trait UserSearchFilterable
{
    public function scopeSearch($query, $keyword)
    {
        return $query->name($keyword)->orWhere(function (Builder $query) use ($keyword) {
            $query->email($keyword);
        });
    }
}
