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


    protected $fillable = ['name', 'description'];


    public function getRouteKeyName()
    {
        return in_array(request()->segment(1), ['admin', 'api', 'datatables']) ? 'id' : 'slug';
    }

    /**
     * [gallery description]
     * @return [type] [description]
     */
    public function image($type = '')
    {
        return $this->getFirstMediaUrl('gallery', $type);
    }

    /**
     * [gallery description]
     * @return [type] [description]
     */
    public function images($type = '')
    {
        return $this->getMedia('gallery', $type);
    }

    /**
     *
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('gallery')
            ->registerMediaConversions(function (Media $media) {
                foreach (config('admin.img') as $key => $value) {
                    $this->addMediaConversion($key)
                        ->crop(Manipulations::CROP_CENTER,(int) $value['width'],(int) $value['height'])
                        ->optimize()
                        ->width((int) $value['width'])
                        ->height((int)$value['height']);
                }
            });
    }


}
