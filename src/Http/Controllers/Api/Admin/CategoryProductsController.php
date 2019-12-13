<?php

namespace DesignByCode\Admin\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DesignByCode\Admin\Models\Product;
use DesignByCode\Admin\Models\Category;

class CategoryProductsController extends Controller
{
    public function index(Category $category, Product $products) 
    {
        return $category->products;
    }
}
