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
        return config('app.url') . $this->getFirstMediaUrl('product', $type);
    }

    /**
     * [product description]
     * @return [type] [description]
     */
    public function images($type = '')
    {
        return config('app.url') . $this->getMedia('product', $type);
    }


    /**
     *
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('category')
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('card')
                    ->crop(Manipulations::CROP_CENTER,(int) config('admin.img.card.width'),(int) config('admin.img.card.height'))
                    ->optimize()
                    ->width((int)config('admin.img.card.width'))
                    ->height((int)config('admin.img.card.height'));

                $this->addMediaConversion('thumb')
                    ->crop(Manipulations::CROP_CENTER,(int) config('admin.img.thumbnail.width'),(int) config('admin.img.thumbnail.height'))
                    ->optimize()
                    ->width((int)config('admin.img.thumbnail.width'))
                    ->height((int)config('admin.img.thumbnail.height'));
            });
    }


}
