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
                    ->crop(Manipulations::CROP_CENTER,(int) config('admin.img.card.width'),(int) config('admin.img.card.height'))
                    ->optimize()
                    ->width(config('admin.img.card.width'))
                    ->height(config('admin.img.card.height'));

                $this->addMediaConversion('thumb')
                    ->crop(Manipulations::CROP_CENTER,(int) config('admin.img.thumbnail.width'),(int) config('admin.img.thumbnail.height'))
                    ->optimize()
                    ->width((int)config('admin.img.thumbnail.width'))
                    ->height((int)config('admin.img.thumbnail.height'));
            });
    }


}
