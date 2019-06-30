<?php

namespace DesignByCode\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Category extends Model implements HasMedia
{

    use HasMediaTrait;

    protected $fillable = ['name', 'slug'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }


    /**
     *
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('category')
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
