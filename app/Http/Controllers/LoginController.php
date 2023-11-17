<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'=> 'required',
            'password'=> 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard/penyakit');
            // return response()->json(['messages' => 'Login Berhasil !', 'url' => url('/')], 200);

        }

        return back()->with('loginError', 'Login Failed');
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/home');

    }

}
