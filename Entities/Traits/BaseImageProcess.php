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
    public function getImagePath($callback, $collection = null, $size = 'thumb')
    {
        $image = $this->getImage($collection);
        if ($image) {
            return $image->getUrl($size);
        }

        return $callback();
    }

    /**
     * @param null $collection
     * @return mixed
     */
    public function getImage($collection = null)
    {
        return $this->getImages($collection)->first();
    }

    /**
     * @param null $collection
     * @return mixed
     */
    public function getImages($collection = null)
    {
        return $this->getMedia($collection);
    }
}
