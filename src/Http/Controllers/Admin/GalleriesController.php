<?php

namespace DesignByCode\Admin\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DesignByCode\Admin\Models\Gallery;
use Illuminate\Http\Request;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin::galleries.index');
    }


    public function edit(Gallery $gallery)
    {
        return view('admin::galleries.edit', compact('gallery'));
    }


}
