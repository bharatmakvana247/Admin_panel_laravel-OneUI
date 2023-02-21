<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\User;
// use Mail;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showForgetPasswordForm()
    {
        return view('backend.emailForget.forgetPassword');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $user_details = User::where('email', $request->email)->first();
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        // dd($request);
        $token = Str::random(64);

        FacadesDB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        $data = [
            'user_name' => $user_details->name,
            'user_image' => $user_details->image,
            'token' => $token
        ];

        Mail::send('backend.emailForget.email.forgetPassword', $data, function ($message) use ($request) {
            $message->to($request->email);
            // $message->attach('default.png');
            $message->subject('Reset Password');
        });

        smilify('success', 'We have e-mailed your password reset link! ⚡️');
        return redirect()->route('admin.login');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm($token)
    {
        return view('backend.emailForget.forgetPasswordLink', ['token' => $token]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = FacadesDB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            smilify('error', 'Invalid token!');
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => FacadesHash::make($request->password)]);

        FacadesDB::table('password_resets')->where(['email' => $request->email])->delete();

        smilify('success', 'Password Reset Successfully. ⚡️');
        return redirect()->route('admin.login');
    }
}