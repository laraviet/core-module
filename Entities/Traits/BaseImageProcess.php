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
        $image = $this->getMedia($collection)->first();
        if ($image) {
            return $image->getUrl($size);
        }

        return $callback();
    }

    public function getImages($collection = null, $size = 'thumb')
    {
        return $this->getMedia($collection);
    }
}
