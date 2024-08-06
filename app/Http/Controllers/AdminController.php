<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginview(){
        return view('login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('home');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function home(){
        return view("home");
    }

    public function informasi(){
        return view('informasi');
    }

    public function artikel(){
        return view('artikel');
    }

    public function logout(Request $request){
        $user = $request->user();
        $user->tokens()->delete();
        return redirect()->route('login');
    }

}
