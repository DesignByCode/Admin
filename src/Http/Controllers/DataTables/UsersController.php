<?php

namespace DesignByCode\Admin\Http\Controllers\DataTables;

use App\User;
use Illuminate\Http\Request;

class UsersController extends DataTableController
{
    protected $modalText = "Users";
    protected $allowCreation = false;
    protected $allowDeletion = true;
    protected $searchable = true;

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function builder()
    {
        return User::query();
    }

    /**
     * @return array
     */
    public function getDisplayableColumns()
    {
        return ['id','name', 'email'];
    }
    /**
     * @return array
     */
    public function getUpdatableColumns()
    {
        return ['name'];
    }

    public function hiddenFields()
    {
        return ['test' => true];
    }

    /**
     * Create a record
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|string|email'
        ]);

        if (!$this->allowCreation) {
            return;
        }

        $this->builder->create($request->only($this->getUpdatableColumns()));
    }

    /**
     * Update model
     * @param  [type]  $id      [description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|email'
        ]);

        $this->builder->find($id)->update($request->only($this->getUpdatableColumns()));
    }


    /**
     * @return array
     */
    public function gethiddenFields()
    {
        return ['header', 'footer'];
    }

}
