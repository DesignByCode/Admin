<?php

namespace DesignByCode\Admin\Models;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Gallery extends Model implements HasMedia
{
    use HasMediaTrait;


    protected $fillable = ['name'];


    /**
     *
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('gallery')
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('card')
                    ->crop(Manipulations::CROP_CENTER, 180, 300)
                    ->optimize()
                    ->width(300)
                    ->height(180);

                $this->addMediaConversion('thumb')
                    ->crop(Manipulations::CROP_CENTER, 140, 140)
                    ->optimize()
                    ->width(140)
                    ->height(140);
            });
    }


}
