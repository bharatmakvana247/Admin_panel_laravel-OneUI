<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ForgotPasswordController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\lockScreenController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', static function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('view:cache');
    Artisan::call('clear-compiled');
    Artisan::call('optimize:clear');
    return response()->json([
        'message' => 'All cache removed successfully.'
    ]);
});

// ================================== Before Login =====================================================

Route::get('/', [AuthController::class, 'welcome'])->name('welcome');

Route::group(['prefix' => 'admin', 'middleware' => 'guest', 'namespace' => 'Admin', 'as' => 'admin.'], function () {

    // ---------------------------- User Authentication ---------------------------------------

    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'customLogin'])->name('login.store');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/customRegister', [AuthController::class, 'customRegister'])->name('customRegister');


    // ---------------------------- Socialite Login ---------------------------------------
    // --Google
    Route::get('/authorized/google', [AuthController::class, 'redirectToGoogle'])->name('authorized.google');
    Route::get('/authorized/google/callback', [AuthController::class, 'handleGoogleCallback']);
    // --Facebook
    Route::get('/authorized/facebook', [AuthController::class, 'facebookRedirect'])->name('authorized.facebook');
    Route::get('/authorized/facebook/callback', [AuthController::class, 'loginWithFacebook']);
    // -- Github
    Route::get('/authorized/github', [AuthController::class, 'githubRedirect'])->name('authorized.github');
    Route::get('/authorized/github/callback', [AuthController::class, 'loginWithGithub']);
    // -- linkedIn
    Route::get('/authorized/linkedin', [AuthController::class, 'linkedinRedirect'])->name('authorized.linkedin');
    Route::get('/authorized/linkedin/callback', [AuthController::class, 'loginWithLinkedin']);


    // ---------------------------- Forgot Password ---------------------------------------

    Route::get('/forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forgetPassword.get');
    Route::post('/forget-password/store', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forgetPassword.post');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('resetPassword.get');
    Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('resetPassword.post');
});

// ================================== After Login =====================================================
// ---------------------------LockScreenController----------------------------------------------------
Route::get('/admin/lock', [lockScreenController::class, 'lockscreen'])->name('admin.lock');
Route::get('/admin/lockUpdate', [lockScreenController::class, 'lockUpdate'])->name('admin.lock.update');
Route::post('/admin/unlock', [lockScreenController::class, 'unlockscreen'])->name('admin.unlock');

Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'screenLock'], 'namespace' => 'Admin', 'as' => 'admin.'], function () {

    // ---------------------------DashboardController----------------------------------------------------
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');

    // ---------------------------ProfileController----------------------------------------------------
    Route::get('/editProfile', [ProfileController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/update/{id}', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/passwordUpdate/{id}', [ProfileController::class, 'updatePass'])->name('profile.updatePass');


    // --------------------------- ProductController ----------------------------------------------------
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    // --------------------------- CategoryController ----------------------------------------------------
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/category/show', [CategoryController::class, 'show'])->name('category.show');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    // --------------------------- BrandController ----------------------------------------------------
    Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
});
