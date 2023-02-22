<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class lockScreenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lockscreen()
    {
        if (Auth::user()->screen_lock == 'on') {
            return view('backend.pages.dashboard.lockscreen');
        } else {
            return redirect()->route('admin.dashboard');
        }
    }

    public function lockUpdate(Request $request)
    {
        try {
            User::where('id', Auth::user()->id)->update([
                'screen_lock' => 'on',
            ]);
            smilify('success', 'Screen Locked..!');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
        smilify('error', 'Error On Lock Account.!');
        return redirect()->route('admin.dashboard');
    }


    public function unlockScreen(Request $request)
    {
        $customMessages = [
            'lock_password.required' => 'Please Enter Password.',
        ];
        $validatedData = Validator::make($request->all(), [
            'lock_password' => 'required|min:6',
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        if ((Hash::check($request->get('lock_password'), Auth::user()->password))) {
            // The passwords matches
            if (Auth::user()->screen_lock == 'on') {
                User::where('id', Auth::user()->id)->update([
                    'screen_lock' => 'off',
                ]);
            } else {
                dd("Error Screen lock");
            }
            smilify('success', 'Password Matched Welcome.');
            return redirect()->route('admin.dashboard');
        } else {
            smilify('error', 'Sorry Password Wrong.!');
            dd("Not Match");
        }
    }
}
