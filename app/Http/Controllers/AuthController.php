<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('unauth.login');
    }
    //
    public function doLogin()
    {
        $credentials = request(['email', 'password']);

        if (auth()->attempt($credentials)) {
            //Đăng nhập thành công
            return redirect()->to(route('my-profile'));
        }

        //đăng nhập thất bại
        return redirect()->back()->with('error', 'Login Failed');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('unauth.profile', compact('user'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to(route('my-login'));
    }

}
