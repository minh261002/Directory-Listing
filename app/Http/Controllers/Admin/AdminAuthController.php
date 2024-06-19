<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}