<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        } else {
            return back()->with('status', 'invalid-credentials');
        }
    }

    public function loginPage()
    {
        return view('pages.auth.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
