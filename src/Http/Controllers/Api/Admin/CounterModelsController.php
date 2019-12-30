<?php
namespace DesignByCode\Admin\Http\Controllers\Api\Admin;



use Illuminate\Http\Request;
use DesignByCode\Admin\Models\User;
use DesignByCode\Tagger\Models\Tag;
use App\Http\Controllers\Controller;
use DesignByCode\Admin\Models\Product;
use DesignByCode\Admin\Models\Category;

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
