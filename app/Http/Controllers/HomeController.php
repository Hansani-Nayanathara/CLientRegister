<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function signin(){
        return view("home.signin");
    }

    public function login(){
        return view("home.login");
    }

    public function profile(){
        return view("home.profile");
    }

    public function signinPost(Request $request) {
        $input = $request->all();
        $user = User::create([
            'name' => $input['name'],
            'address' => $input['address'],
            'email' => $input['email'],
            'password' => Hash::make($input['password'])
        ]);

        // Log in the user
        Auth::login($user);

        // Redirect to profile route
        return redirect()->route('profile');
    }

    public function loginPost(Request $request){

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('profile');
        }

        return redirect()->route('login')->with('error', 'Invalid credentials');

    }
}
