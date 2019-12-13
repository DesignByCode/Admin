<?php

namespace DesignByCode\Admin\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotifacationsController extends Controller
{
    public function index()
    {
        return view('admin::notifacations.index');
    }
}
