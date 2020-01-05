<?php

namespace DesignByCode\Admin\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DesignByCode\Admin\Models\Video;
use DesignByCode\Admin\Models\Product;
use DesignByCode\Admin\Http\Requests\AddVideoRequest;
use DesignByCode\Admin\Http\Resources\VideosCollection;

class ProductVideosController extends Controller
{

    public function index(Product $product)
    {
        return new VideosCollection($product->videos);
    }
    

    public function store(AddVideoRequest $request, Product $product)
    {
        
        $product->videos()->create([
            'url' => $request->url
        ]);
    }

    public function destroy($id) 
    {
        $video = Video::findOrFail($id);

        $video->delete();
    }


}
