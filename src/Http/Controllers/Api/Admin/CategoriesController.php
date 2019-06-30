<?php

namespace DesignByCode\Admin\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use DesignByCode\Admin\Http\Resources\CategoriesCollection;
use DesignByCode\Admin\Models\Category;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =  Category::get();

        return new CategoriesCollection($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:categories'
        ]);

        Category::updateOrCreate($request->only('name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
           'name' => 'required|unique:categories,name,' . $request->id
        ]);

        $category->update($request->all());
    }


    /**
     * @param Category $category
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request, Category $category)
    {

        $details = $category->addMedia($request->file)->toMediaCollection('category');

        return response()->json([
            'id' => $details->id,
            'size' => $details->size,
            'name' => $details->name,
            'collection_name' => $details->collection_name
        ]);
    }

    public function delete_image($id){
        $media = Media::find($id)->delete();

        return response()->json([
            'id' => $id,
            'media' => $media
        ]);
    }
}
