<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    function login()
    {
        return view('admin.auth.login');
    }

    function forgotPassword()
    {
        return view('admin.auth.forgot-password');
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Notify::success('Logout successfully');
        return redirect()->route('admin.login');
    }
}