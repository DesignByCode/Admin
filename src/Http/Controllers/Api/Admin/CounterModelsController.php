<?php
namespace DesignByCode\Admin\Http\Controllers\Api\Admin;


use App\Http\Controllers\Controller;
use App\User;
use DesignByCode\Admin\Models\Category;
use DesignByCode\Admin\Models\Product;
use DesignByCode\Tagger\Models\Tag;
use Illuminate\Http\Request;

class CounterModelsController extends Controller
{

    /**
     * @return count
     */
    public function users()
    {
        return User::clients()->count();
    }

    /**
     * @return count
     */
    public function products()
    {
        return Product::count();
    }


    /**
     * @return count
     */
    public function categories()
    {
        return Category::count();
    }

    /**
     * @return count
     */
    public function tags()
    {
        return Tag::count();
    }



}
