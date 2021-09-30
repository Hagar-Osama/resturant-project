<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $userData = $request->only('email', 'password');
        if (Auth::attempt($userData)) {
            return redirect(route('admin.index'));
        }
        Session()->flash('error', 'wrong email or password');
        return redirect(route('admin.loginpage'));


    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('admin.loginpage'));
    }

}
