<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginPage() {
        return view('login');
    }
    public function registerPage() {
        return view('register');
    }

    public function registerForm(Request $request) {
        $addUser = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = User::create($addUser);
        auth()->login($user);
        return redirect('/');
    }

    public function loginForm(Request $request) {
        $checkUser = $request->validate([
            'email' => 'required',
            'password' =>'required'
        ]);
        // $checkUser['password'] = bcrypt($checkUser['password']);
        if(auth()->attempt($checkUser)) {
            $request->session()->regenerate();
            return redirect('/');
        }else{
            return redirect('/login_page');
        }
    }
}
