<?php

namespace DesignByCode\Admin\Traits;

use DesignByCode\Admin\Models\Video;

trait HasVideo
{


    public function videos()
    {
        return $this->morphMany(Video::class, 'videoable');
    }



}
