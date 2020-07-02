<?php

namespace Modules\Core\Entities;

use Spatie\Permission\Traits\HasRoles;

class User extends \App\User
{
    use HasRoles;
}
