<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{



    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        // Determine if login input is an email or phone number
        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'login_id';

        // Attempt login with either email or phone
        if (Auth::attempt([$fieldType => $request->login, 'password' => $request->password])) {
            return redirect()->route('home')->with('success', 'Logged in successfully!');
        }

        // If login fails, redirect back with an error
        return redirect()->back()->withErrors(['login' => 'Invalid login credentials'])->withInput();
    }
}
