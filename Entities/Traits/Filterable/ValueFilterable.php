<?php

namespace Modules\Core\Entities\Traits\Filterable;

use Illuminate\Database\Eloquent\Builder;

trait ValueFilterable
{
    /**
     * Scope a query to only include records have name that contains $email.
     *
     * @param Builder $query
     * @param $value
     * @return Builder
     */
    public function scopeValueOf($query, $value)
    {
        return $query->whereTranslation('value', $value);
    }
}
