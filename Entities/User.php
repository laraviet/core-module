<?php

namespace Modules\Core\Entities;

use Modules\Core\Entities\Traits\Scope\UserScope;
use Spatie\Permission\Traits\HasRoles;

class User extends \App\User
{
    use HasRoles, UserScope;
}
