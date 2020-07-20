<?php

namespace Modules\Core\Entities\Traits\Filterable;

use Illuminate\Database\Eloquent\Builder;

trait EmailFilterable
{
    /**
     * Scope a query to only include records have name that contains $email.
     *
     * @param Builder $query
     * @param string $email
     *
     * @return Builder
     */
    public function scopeEmail($query, $email)
    {
        return $query->where('email', $email);
    }
}
