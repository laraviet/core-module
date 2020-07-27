<?php

namespace Modules\Core\Entities\Traits;

trait BaseImageProcess
{
    /**
     * @param $callback
     * @param null $collection
     * @param string $size
     * @return mixed
     */
    public function getImage($callback, $collection = null, $size = 'thumb')
    {
        $avatarUpload = $this->getMedia($collection)->first();
        if ($avatarUpload) {
            return $avatarUpload->getUrl($size);
        }

        return $callback();
    }
}
