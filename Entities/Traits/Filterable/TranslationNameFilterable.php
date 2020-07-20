<?php

namespace Modules\Core\Entities\Traits\Filterable;

use Illuminate\Database\Eloquent\Builder;

trait TranslationNameFilterable
{
    /**
     * Scope a query to only include records have name that contains $name.
     *
     * @param Builder $query
     * @param string $name
     *
     * @return Builder
     */
    public function scopeName($query, $name)
    {
        return $query->whereTranslationLike('name', "%{$name}%");
    }
}
