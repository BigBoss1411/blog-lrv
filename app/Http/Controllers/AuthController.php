<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function submitLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if (Auth::attempt([
            'password' => $password,
            'email' => $username
        ])) {
            return redirect()
                ->route('dashboard');
        } else {
            return back()
                ->withError('Tên tài khoản hoặc mật khẩu không đúng');;
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
