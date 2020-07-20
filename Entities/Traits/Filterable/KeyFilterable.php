<?php

namespace Modules\Core\Entities\Traits\Filterable;

use Illuminate\Database\Eloquent\Builder;

trait KeyFilterable
{
    /**
     * Scope a query to only include records have name that contains $email.
     *
     * @param Builder $query
     * @param $key
     * @return Builder
     */
    public function scopeKey($query, $key)
    {
        return $query->where('key', $key);
    }
}
