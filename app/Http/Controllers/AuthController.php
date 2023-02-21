<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Illuminate\Support\Facades\Validator;
use Storage;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function welcome()
    {
        return view('welcome');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (Auth::check()) {
        //     return redirect()->route('admin.dashboard');
        // } else {
        return view('backend.pages.auth.login');
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     *  @param  \Illuminate\Http\Request  $request
     */
    public function customLogin(Request $request)
    {
        // dd($request->all());
        $customMessages = [
            'email.required' => 'Please Enter Email.',
            'password.required' => 'Please Enter Password.',
        ];
        $validatedData = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:6',
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me)) {
            // if (!empty($request->has('remember_me'))) {
            //     $email_cookie = $request->email;
            //     $password_cookie = $request->password;
            //     setcookie("email_cookie", $email_cookie, time() + 3600, '/');
            //     setcookie("password_cookie", $password_cookie, time() + 3600, '/');
            // } else {
            //     if (isset($_COOKIE['email_cookie'])) {
            //         setcookie("email_cookie", "", time() + 3600, '/');
            //     }
            //     if (isset($_COOKIE['password_cookie'])) {
            //         setcookie("password_cookie", "", time() + 3600, '/');
            //     }
            // }
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                smilify('success', 'Welcome to Admin Panel. ⚡️');
                return redirect()->route('admin.dashboard');
            }
        }
        smilify('error', 'Login details are not valid');
        return redirect()->route('admin.login');
    }


    /**
     * Store a newly created resource in storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('backend.pages.auth.registration');
    }


    /**
     * Store a newly users created resource in storage
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function customRegister(Request $request)
    {
        $customMessages = [
            'username.required' => 'Please Enter Username.',
            'email.required' => 'Please Enter Email.',
            'password.required' => 'Please Enter Password.',
            'password.confirmed' => 'Password and Confirm Password is not matched.',
            'password_confirmation.required' => 'Please Enter Confirm Password.',
            'signup_terms.required' => 'Please Enter signup_terms.',
        ];
        $validatedData = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'signup_terms' => 'required'
        ], $customMessages);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = $file->getClientOriginalName();
                    FacadesStorage::disk('public')->putFileAs('userImage', $file, $filename);
                }
            } else {
                $filename = 'default.png';
            }
            $user = User::create([
                'name'   => $request->get('username'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'image' => $filename,
                'signup_terms' => $request->get('signup_terms'),
            ]);
            return redirect()->route('admin.dashboard');
        } catch (\Exception $e) {
            dd($e);
            smilify('error', 'User was Not Added.');
            return back();
        }
    }


    /**
     * Display via Google Socialite
     *
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    /**
     * Store a newly Via Google socialite
     *
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $is_user = User::where('social_id', $user->id)->first();
            if (!empty($user->avatar)) {
                $filename = $user->id . '.png';
                FacadesStorage::disk('public')->put('userImage/' . $filename, file_get_contents($user->avatar));
            } else {
                $filename = 'default.png';
            }
            if (!$is_user) {
                $saveUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'user_type' => 'SuperAdmin',
                    'social_id' => $user->id,
                    'image' => $filename,
                    'social_media' => 'google',
                    'password' =>  Hash::make($user->name . '@' . $user->id)
                ]);
            } else {
                $saveUser = User::updateOrCreate([
                    'social_id' => $user->id,
                ], [
                    'name' => $user->name,
                    'email' => $user->email,
                    'user_type' => 'SuperAdmin',
                    'social_media' => 'google',
                    'image' => $filename,
                    'password' => Hash::make($user->name . '@' . $user->id)
                ]);
                $saveUser = User::where('social_id', $user->id)->first();
            }
            Auth::login($saveUser);
            return redirect()->route('admin.dashboard');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Show Login in Facebook  Socialite
     *
     * @return response()
     */
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Login Via Facebook
     *
     * @return response()
     */
    public function loginWithFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $is_user = User::where('social_id', $user->id)->first();
            if (!empty($user->avatar)) {
                $filename = $user->id . '.png';
                FacadesStorage::disk('public')->put('userImage/' . $filename, file_get_contents($user->avatar));
            } else {
                $filename = 'default.png';
            }
            if (!$is_user) {
                $saveUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'user_type' => 'SuperAdmin',
                    'social_id' => $user->id,
                    'image' => $filename,
                    'social_media' => 'facebook',
                    'password' =>  Hash::make($user->name . '@' . $user->id)
                ]);
            } else {
                $saveUser = User::updateOrCreate([
                    'social_id' => $user->id,
                ], [
                    'name' => $user->name,
                    'email' => $user->email,
                    'user_type' => 'SuperAdmin',
                    'social_media' => 'facebook',
                    'image' => $filename,
                    'password' => Hash::make($user->name . '@' . $user->id)
                ]);
                $saveUser = User::where('social_id', $user->id)->first();
            }
            Auth::login($saveUser);
            return redirect()->route('admin.dashboard');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show Login in github Socialite
     *
     * @return response()
     */
    public function githubRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Login Via Facebook
     *
     * @return response()
     */
    public function loginWithGithub()
    {
        try {
            $user = Socialite::driver('github')->user();
            $is_user = User::where('social_id', $user->id)->first();
            if (!empty($user->avatar)) {
                $filename = $user->id . '.png';
                FacadesStorage::disk('public')->put('userImage/' . $filename, file_get_contents($user->avatar));
            } else {
                $filename = 'default.png';
            }
            if (!$is_user) {
                $saveUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'user_type' => 'SuperAdmin',
                    'social_id' => $user->id,
                    'image' => $filename,
                    'social_media' => 'github',
                    'password' =>  Hash::make($user->name . '@' . $user->id)
                ]);
            } else {
                $saveUser = User::updateOrCreate([
                    'social_id' => $user->id,
                ], [
                    'name' => $user->name,
                    'email' => $user->email,
                    'user_type' => 'SuperAdmin',
                    'social_media' => 'github',
                    'image' => $filename,
                    'password' => Hash::make($user->name . '@' . $user->id)
                ]);
                $saveUser = User::where('social_id', $user->id)->first();
            }
            Auth::login($saveUser);
            return redirect()->route('admin.dashboard');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show Login in linkedIn Socialite
     *
     * @return response()
     */
    public function linkedinRedirect()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    /**
     * Login Via linkedin
     *
     * @return response()
     */
    public function loginWithLinkedin()
    {
        try {
            dd("try");
            $user = Socialite::driver('linkedin')->user();
            dd($user);
            $is_user = User::where('social_id', $user->id)->first();
            if (!empty($user->avatar)) {
                $filename = $user->id . '.png';
                FacadesStorage::disk('public')->put('userImage/' . $filename, file_get_contents($user->avatar));
            } else {
                $filename = 'default.png';
            }
            if (!$is_user) {
                $saveUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'user_type' => 'SuperAdmin',
                    'social_id' => $user->id,
                    'image' => $filename,
                    'social_media' => 'github',
                    'password' =>  Hash::make($user->name . '@' . $user->id)
                ]);
            } else {
                $saveUser = User::updateOrCreate([
                    'social_id' => $user->id,
                ], [
                    'name' => $user->name,
                    'email' => $user->email,
                    'user_type' => 'SuperAdmin',
                    'social_media' => 'github',
                    'image' => $filename,
                    'password' => Hash::make($user->name . '@' . $user->id)
                ]);
                $saveUser = User::where('social_id', $user->id)->first();
            }
            Auth::login($saveUser);
            return redirect()->route('admin.dashboard');
        } catch (Exception $e) {
            dd("throw", $e);

            echo $e;
        }
    }
}
