<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use FileUploadTrait;

    function index()
    {
        return view('frontend.dashboard.profile.index');
    }

    function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();
        $avatarPath = $this->uploadImage($request, 'avatar', $request->old_avatar);

        $user->avatar = !empty($avatarPath) ? $avatarPath : $request->old_avatar;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->website = $request->website;
        $user->facebook = $request->facebook;
        $user->twitter = $request->twitter;
        $user->instagram = $request->instagram;
        $user->linkedin = $request->linkedin;
        $user->about = $request->about;
        $user->save();

        toastr()->success('Profile updated successfully');
        return redirect()->back();
    }

    function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();
        if (!\Hash::check($request->current_password, $user->password)) {
            toastr()->error('Current password does not match!');
            return redirect()->back();
        }

        $user->password = \Hash::make($request->password);
        $user->save();

        toastr()->success('Password updated successfully!');
        return redirect()->back();
    }
}