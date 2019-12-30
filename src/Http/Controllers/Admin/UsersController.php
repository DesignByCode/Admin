<?php

namespace DesignByCode\Admin\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DesignByCode\Admin\Models\User;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        return view('admin::users.index');
    }

    public function edit($id)
    {
        $permissions = Permission::get();

        $user = User::with('roles', 'permissions')->findOrFail($id);

        return view('admin::users.edit', compact('user', 'permissions'));
    }
}
