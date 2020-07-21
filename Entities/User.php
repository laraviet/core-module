<?php

namespace Modules\Core\Entities;

use Modules\Core\Entities\Traits\Attribute\UserAttribute;
use Modules\Core\Entities\Traits\Scope\UserScope;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\Permission\Traits\HasRoles;


class User extends \App\User implements HasMedia
{
    use HasRoles, UserScope, HasImageModel, UserAttribute;

    const AVATAR_COLLECTION = 'avatar';
}
