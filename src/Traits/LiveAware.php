<?php

namespace DesignByCode\Admin\Traits;

use Illuminate\Database\Eloquent\Builder;


trait LiveAware
{

    /**
     * [scopeLive description]
     * @param  Builder $builder [description]
     * @return [type]           [description]
     */
    public function scopeLive(Builder $builder)
    {
        return $builder->where('live', true);
    }

    /**
     * [isLive description]
     * @return boolean [description]
     */
    public function isLive()
    {
        return $this->live === true;
    }

    /**
     * [isNotLive description]
     * @return boolean [description]
     */
    public function isNotLive()
    {
        return !$this->isLive();
    }



}
