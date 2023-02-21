<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function editProfile()
    {
        $form_title = "Profile";
        return view('backend.pages.profile.edit', compact('form_title'));
    }

    public function updateProfile(Request $request, $id)
    {
        $customMessages = [
            'username.required' => 'Please Enter Username.',
            'email.required' => 'Please Enter Email.',
            'image.required' => 'Please Enter Image.',
        ];
        $validatedData = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|unique:users,email,' . $request->id,
            'image' => 'required'
        ], $customMessages);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        // dd($request->all());
        try {
            $oldDetails = User::where('id', $id)->get();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $filesystem = Storage::disk('public');
                $filesystem->putFileAs('userImage', $file, $filename);
            } else {
                if (!empty($oldDetails->image)) {
                    $filename = $oldDetails->image;
                } else {
                    //Empty image file select then
                    $filename = 'default.png';
                    // $filename = $oldDetails->image;
                }
            }
            $user = User::where('id', $id)->update([
                'name' => $request->get('username'),
                'email' => $request->get('email'),
                'image' => $filename,
            ]);
            smilify('success', 'User Updated Successfully. ⚡️');
            return redirect()->route('admin.dashboard');
        } catch (Exception $e) {
            dd($e);
            smilify('error', 'Sorry User was not Updated.');
            return redirect()->back();
        }
    }

    public function updatePass(Request $request, $id)
    {
        $customMessages = [
            'current_password.required' => 'Please Enter Current Password.',
            'password.required' => 'Please Enter Password.',
            'password.confirmed' => 'Password and Confirm Password is not matched.',
            'password_confirmation.required' => 'Please Enter Confirm Password.',
        ];
        $validatedData = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ], $customMessages);

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // The passwords matches
            smilify('error', 'Your current password does not matches with the old password you provided. Please try again.');
            return redirect()->back();
        }

        if (strcmp($request->get('current_password'), $request->get('password')) == 0) {
            //Current password and new password are same
            smilify('error', 'New Password cannot be same as your current password. Please choose a different password.');
            return redirect()->back();
        }

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        try {
            $user = User::where('id', $id)->update([
                'password' => Hash::make($request->get('password')),
            ]);
            smilify('success', 'User Password Update Successfully 🔥 !');
            return redirect()->route('admin.logout');
        } catch (Exception $e) {
            dd($e);
            smilify('error', 'Sorry User Password was not Updated.');
            return redirect()->back();
        }
    }
}
