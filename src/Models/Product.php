<?php

namespace DesignByCode\Admin\Models;


use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use DesignByCode\Admin\Traits\LiveAware;
use CyrildeWit\EloquentViewable\Viewable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use DesignByCode\Sluggable\Traits\Sluggable;
use DesignByCode\Tagger\Models\TaggableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

class Product extends Model implements HasMedia, ViewableContract
{
    use HasMediaTrait, TaggableTrait, Viewable, LiveAware, Sluggable, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'sku',
        'price',
        'sales_price',
        'ad_text',
        'live',
        'excerpt',
        'content',
        'availability',
        'sale_end',
        'publish_at'
    ];

    protected $dates = ['sale_end', 'publish_at'];

    protected $casts = [
        'sale_end' => 'date:Y-m-d'
    ];


    /**
     * [images description]
     * @return [type] [description]
     */
    public function image($type = '')
    {
        return config('app.url') . $this->getFirstMediaUrl('product', $type);
    }

    /**
     * [images description]
     * @return [type] [description]
     */
    public function images($type = '')
    {
        return config('app.url') . $this->getMedia('product', $type);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    /**
     * methods
     * @return [type] [description]
     */
    public function pre_order()
    {
        if ($this->availability === 'pre-order') {
            return true;
        }

        return false;
    }

    /**
     * [scopeComingSoon description]
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    public function scopeComingSoon($query)
    {
        return $query->where('availability', 'coming-soon');
    }

    public function scopePublished($query)
    {
        // return $query->where('publish_at', function )
    }

    public function getCustomExcerptAttribute()
    {
        if ($this->excerpt && $this->content) {  
            $ex = ($this->excerpt) ? $this->excerpt : $this->content;
            return trim(substr($ex, 0, 120)) . '...';
        }
        return '';
    }


    /**
     *
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('product')
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
