<?php

namespace DesignByCode\Admin\Observers;

use Illuminate\Support\Str;
use DesignByCode\Admin\Models\Category;



class CategoryObserver
{
    /**
     * Handle the category "creating" event.
     *
     * @param  DesignByCode\Admin\Models\Category  $category
     * @return void
     */
    public function creating(Category $category)
    {
        $category->name = Str::title($category->name);
    }

    /**
     * Handle the category "updating" event.
     *
     * @param  DesignByCode\Admin\Models\Category  $category
     * @return void
     */
    public function updating(Category $category)
    {
        $category->name = Str::title($category->name);
    }

}
