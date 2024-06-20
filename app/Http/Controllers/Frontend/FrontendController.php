<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $hero = Hero::first();
        return view('frontend.home.index', compact('hero'));
    }
}
