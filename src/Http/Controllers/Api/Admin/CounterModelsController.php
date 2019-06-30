<?php
namespace DesignByCode\Admin\Http\Controllers\Api\Admin;


use App\Http\Controllers\Controller;
use App\User;
use DesignByCode\Admin\Models\Product;
use Illuminate\Http\Request;

class CounterModelsController extends Controller
{

    public function users()
    {
        return User::count();
    }

    public function products()
    {
        return Product::count();
    }



}
