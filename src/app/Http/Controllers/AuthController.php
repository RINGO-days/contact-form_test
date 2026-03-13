<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return redirect('/register');
    }
    public function login(){
        return view('login');
    }
    public function logout(){
        return redirect('/login')->with('success','ログアウトしました');
    }
    public function admin(){
        return redirect('/admin')->with('success','ログインしました');
    }
}
