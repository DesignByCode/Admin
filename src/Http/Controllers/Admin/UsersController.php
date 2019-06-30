<?php

namespace DesignByCode\Admin\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
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
