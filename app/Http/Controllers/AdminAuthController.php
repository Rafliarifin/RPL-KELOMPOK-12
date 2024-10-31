<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        if (session()->has('admin_authenticated')) {
            return redirect()->route('admin.cars.index');
        }
        return view('admin.login');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8'
        ], [
            'password.min' => 'Password harus terdiri dari minimal 8 karakter.'
        ]);
        
        // Mengambil password dari .env
        $adminPassword = config('admin.password');
        
        if ($request->password === $adminPassword) {
            session(['admin_authenticated' => true]);
            return redirect()->route('admin.cars.index');
        }
        
        return back()->withErrors([
            'password' => 'Password Salah'
        ]);
    }
    
    public function logout()
    {
        session()->forget('admin_authenticated');
        return redirect()->route('admin.login');
    }
}