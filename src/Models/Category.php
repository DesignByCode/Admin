<?php

namespace DesignByCode\Admin\Models;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Category extends Model implements HasMedia
{

    use HasMediaTrait, SoftDeletes;

    protected $fillable = ['name', 'slug', 'description', 'content'];


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
                    ->crop(Manipulations::CROP_CENTER, config('admin.img.card.width'), config('admin.img.card.height'))
                    ->optimize()
                    ->width(config('admin.img.card.width'))
                    ->height(config('admin.img.card.height'));

                $this->addMediaConversion('thumb')
                    ->crop(Manipulations::CROP_CENTER, config('admin.img.thumbnail.width'), config('admin.img.thumbnail.height'))
                    ->optimize()
                    ->width(config('admin.img.thumbnail.width'))
                    ->height(config('admin.img.thumbnail.height'));
            });
    }


}
