<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Admin\Post;
use App\Models\Admin\Agent;
use App\Models\Admin\Property;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function dashboard()
    {
       

        return view('admin.dashboard.index');
    }
}
