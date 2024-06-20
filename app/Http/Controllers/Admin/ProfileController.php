<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return view('admin.profile.index');
    }

    function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();
        $avatarPath = $this->uploadImage($request, 'avatar', $user->avatar);
        $user->avatar = $avatarPath ? $avatarPath : $user->avatar;

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

        toastr()->success('Profile updated successfully!');
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