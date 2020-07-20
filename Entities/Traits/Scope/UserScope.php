<?php

namespace Modules\Core\Entities\Traits\Scope;

use Modules\Core\Entities\Traits\Filterable\EmailFilterable;
use Modules\Core\Entities\Traits\Filterable\NameFilterable;
use Modules\Core\Entities\Traits\Filterable\UserSearchFilterable;

trait UserScope
{
    use NameFilterable, EmailFilterable, UserSearchFilterable;
}
