<?php

namespace DesignByCode\Admin\Models;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use DesignByCode\Sluggable\Traits\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Category extends Model implements HasMedia
{

    use HasMediaTrait, Sluggable, SoftDeletes;

    protected $fillable = ['name', 'slug', 'description', 'content'];


    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * [product description]
     * @return [type] [description]
     */
    public function image($type = '')
    {
        return  $this->getFirstMediaUrl('category', $type);
    }

    /**
     * [product description]
     * @return [type] [description]
     */
    public function images($type = '')
    {
        return  $this->getMedia('category', $type);
    }


    /**
     *
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('category')
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
