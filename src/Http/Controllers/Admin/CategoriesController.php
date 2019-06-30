<?php

namespace DesignByCode\Admin\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use DesignByCode\Admin\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin::categories.index');
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('admin::categories.edit', compact('category'));
    }


}
