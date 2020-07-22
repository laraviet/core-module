<?php

namespace Modules\Core\Entities;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Modules\Core\Entities\Traits\Attribute\UserAttribute;
use Modules\Core\Entities\Traits\HasImageModel;
use Modules\Core\Entities\Traits\Scope\UserScope;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\Permission\Traits\HasRoles;


class User extends \App\User implements HasMedia
{
    use HasRoles, UserScope, HasImageModel, UserAttribute, Cachable;

    const AVATAR_COLLECTION = 'avatar';
}
