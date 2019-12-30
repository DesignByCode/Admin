<?php

namespace DesignByCode\Admin\Observers;

use Illuminate\Support\Str;
use DesignByCode\Admin\Models\Gallery;



class GalleryObserver
{
    /**
     * Handle the gallery "creating" event.
     *
     * @param  DesignByCode\Admin\Models\Gallery  $gallery
     * @return void
     */
    public function creating(Gallery $gallery)
    {
        $gallery->name = Str::title($gallery->name);
    }

    /**
     * Handle the gallery "updating" event.
     *
     * @param  DesignByCode\Admin\Models\Gallery  $gallery
     * @return void
     */
    public function updating(Gallery $gallery)
    {
        $gallery->name = Str::title($gallery->name);
    }

}
