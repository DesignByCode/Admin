<?php

namespace DesignByCode\Admin\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DesignByCode\Admin\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin::products.index');
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Product $product)
    {
        $views = views($product)->count();
        return view('admin::products.edit', compact('product', 'views'));
    }


}
