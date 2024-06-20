<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use App\Models\Hero;

class HeroController extends Controller
{
    use FileUploadTrait;

    function index()
    {
        $hero = Hero::first();
        return view('admin.hero.index', compact('hero'));
    }

    function updateHeroSection(Request $request)
    {
        $imagePath = $this->uploadImage($request, 'background', $request->old_background);

        Hero::updateOrCreate(
            ['id' => 1],
            [
                'background' => !empty($imagePath) ? $imagePath : $request->old_background,
                'title' => $request->title,
                'sub_title' => $request->sub_title
            ]
        );

        toastr()->success('Updated Successfully');

        return redirect()->back();
    }
}
