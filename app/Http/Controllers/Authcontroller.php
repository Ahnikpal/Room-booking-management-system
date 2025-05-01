<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Add this line to import the Hash facade
use App\Models\User; // Add this line to import the User model
use Illuminate\Http\Request;class Authcontroller extends Controller
{
    public function login(){
        return view('auth.login');

    }
    public function authenticate(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // 🔐 Helps prevent session fixation

        $userType = Auth::user()->user_type;

        return match ($userType) {
            1 => redirect()->route('dashboard.admin'),
            2 => redirect()->route('dashboard.user'),
            default => redirect()->route('login')->with('error', 'Unauthorized user type')
        };
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
}

    public function signup(){
        return view('auth.register');

    }
    
    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_no' => 'required',
            'password' => 'required|confirmed', // Optional confirm password
        ]);
    
        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_no' => $request->get('phone_no'),
            'password' => Hash::make($request->get('password')),
            'user_type' => 1,
        ]);
    
        $user->save();
    
        return redirect()->route('login')->with('success', 'User created successfully!');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    
}
 