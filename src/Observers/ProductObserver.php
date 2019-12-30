<?php

namespace DesignByCode\Admin\Observers;

use Illuminate\Support\Str;
use DesignByCode\Admin\Models\Product;



class ProductObserver
{
    /**
     * Handle the product "creating" event.
     *
     * @param  DesignByCode\Admin\Models\Product  $product
     * @return void
     */
    public function creating(Product $product)
    {
        $product->name = Str::title($product->name);
    }

    /**
     * Handle the product "updating" event.
     *
     * @param  DesignByCode\Admin\Models\Category  $product
     * @return void
     */
    public function updating(Product $product)
    {
        $product->name = Str::title($product->name);
    }

}
