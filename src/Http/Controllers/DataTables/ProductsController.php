<?php

namespace DesignByCode\Admin\Http\Controllers\DataTables;

use DesignByCode\Admin\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends DataTableController
{

    protected $modalText = "Products";
    protected $editModalPath = 'products';
    protected $allowCreation = false;
    protected $searchable = true;
    protected $allowDeletion = true;

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function builder()
    {
        return Product::query();
    }

    /**
     * @return array
     */
    public function getDisplayableColumns()
    {
        return ['id','name', 'slug', 'sku'];
    }
    /**
     * @return array
     */
    public function getUpdatableColumns()
    {
        return ['name', 'slug', 'sku'];
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $this->builder->find($id)->update($request->only($this->getUpdatableColumns()));
    }

}
