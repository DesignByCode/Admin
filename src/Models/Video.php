<?php

namespace DesignByCode\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    protected $fillable = ['url'];


    public function videoable()
    {
        return $this->morphTo();
    }





}
