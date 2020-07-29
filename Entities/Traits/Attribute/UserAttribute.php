<?php

namespace Modules\Core\Entities\Traits\Attribute;

use Modules\Core\Entities\Traits\BaseImageProcess;
use Modules\Core\Entities\User;

trait UserAttribute
{
    use BaseImageProcess;

    public function getAvatarAttribute()
    {
        return $this->getImagePath('noImage', User::AVATAR_COLLECTION);
    }

    public function getDefaultAvatarAttribute()
    {
        return $this->getImagePath('defaultAvatar', User::AVATAR_COLLECTION);
    }
}
