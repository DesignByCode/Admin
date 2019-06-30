<?php

namespace DesignByCode\Admin\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use DesignByCode\Admin\Http\Requests\GalleryCreateRequest;
use DesignByCode\Admin\Http\Resources\GalleryCollection;
use DesignByCode\Admin\Models\Gallery;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::get();
        return new GalleryCollection($gallery);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryCreateRequest $request)
    {
        Gallery::create($request->only('name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    public function upload(Request $request, Gallery $gallery)
    {

        $details = $gallery->addMedia($request->file)->toMediaCollection('gallery');

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
