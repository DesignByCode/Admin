<?php

namespace DesignByCode\Admin\Http\Controllers\Api\Admin;


use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DesignByCode\Admin\Http\Requests\ProductCreateRequest;
use DesignByCode\Admin\Http\Requests\ProductUpdateRequest;
use DesignByCode\Admin\Http\Resources\ProductResource;
use DesignByCode\Admin\Models\Product;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request, Product $product)
    {
        $product = $product->create($request->only('category_id', 'name'));


        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('tags', 'media')->findOrFail($id);
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( ProductUpdateRequest$request, Product $product)
    {
        $product->fill($request->all());
        $product->sale_end = Carbon::parse($request->sale_end);
        // $product->publish_at = Carbon::parse($request->publish_at);
        $product->save();
    }

    public function updateActive(Request $request, $id)
    {
        $product = Product::find($id);
        $product->live = ($request->live == 'on') ? true : false;
        $product->save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request, Product $product)
    {

        $details = $product->addMedia($request->file)->toMediaCollection('product');

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
