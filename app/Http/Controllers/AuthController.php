<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function loginPage() { return Inertia::render('Auth/Login'); }
    public function registerPage() { return Inertia::render('Auth/Register'); }

    public function login(Request $request)
    {
        $credentials = $request->validate(['email' => ['required', 'email'], 'password' => ['required']]);
        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors(['email' => 'Email atau password belum tepat.']);
        }
        $request->session()->regenerate();
        return to_route('dashboard');
    }

    public function register(Request $request)
    {
        $data = $request->validate(['name' => ['required', 'max:80'], 'email' => ['required', 'email', 'unique:users'], 'password' => ['required', 'min:8', 'confirmed']]);
        $user = User::create(['name' => $data['name'], 'email' => $data['email'], 'password' => Hash::make($data['password'])]);
        Auth::login($user);
        return to_route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('home');
    }
}