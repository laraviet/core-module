<?php

namespace Modules\Core\Entities\Traits\Attribute;

use Modules\Core\Entities\User;

trait UserAttribute
{
    public function getAvatarAttribute()
    {
        return $this->getImage('noImage');
    }

    public function getDefaultAvatarAttribute()
    {
        return $this->getImage('defaultAvatar');
    }

    private function getImage($callback)
    {
        $avatarUpload = $this->getMedia(User::AVATAR_COLLECTION)->first();
        if ($avatarUpload) {
            return $avatarUpload->getUrl('thumb');
        }

        return $callback();
    }
}
