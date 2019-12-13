<?php

namespace DesignByCode\Admin\Observers;

use Illuminate\Support\Str;
use DesignByCode\Admin\Models\Category;



class CategoryObserver
{
    /**
     * Handle the category "creating" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function creating(Category $category)
    {
        $category->name = Str::title($category->title);
        $category->slug = Str::slug($category->title);
    }

    /**
     * Handle the category "updating" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function updating(Category $category)
    {
        $category->name = Str::title($category->title);
        $category->slug = Str::slug($category->title);
    }

}
