<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function home(Request $request)
    {
        return dva($request->path(), '管理员页面');
    }
}
