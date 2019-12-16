<?php

namespace DesignByCode\Admin\Models;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use DesignByCode\Sluggable\Traits\Sluggable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Gallery extends Model implements HasMedia
{
    use HasMediaTrait, Sluggable;


    protected $fillable = ['name'];


    /**
     * [gallery description]
     * @return [type] [description]
     */
    public function image($type = '')
    {
        return config('app.url') . $this->getFirstMediaUrl('gallery', $type);
    }

    /**
     * [gallery description]
     * @return [type] [description]
     */
    public function images($type = '')
    {
        return config('app.url') . $this->getMedia('gallery', $type);
    }

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
