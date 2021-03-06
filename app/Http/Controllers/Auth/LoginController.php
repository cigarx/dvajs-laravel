<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('articles');
        }
        return dva('管理员登录');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function apiLogin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:32',
            'password' => 'required|string|max:64',
        ]);
        if (Auth::attempt($request->only(['name', 'password']), $request->has('remember'))) {
            $url = Auth::user()->isAdmin() ? url('/admin') : url('/');
            return ['msg' => 'success', 'url' => $url];
        }
        return ['msg' => '登录失败，请检查用户名或者密码！'];
    }
}
