<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerForm() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'c_password' => 'required|same:password',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login.form')->with('success', 'Registered successfully! Please login.');
    }

    public function loginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


    //    $user =  User::where('email', $request->email)->first();

    //     if($user && hash::check($request->email ,$request->password)){
    //         Auth::login($user);
    //         return redirect()->route('dashboard');
       
    //     }else{
    //         return redirect()->back()->with('error','Does not match email and password...!');
    //     }

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Invalid email and password']);
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
