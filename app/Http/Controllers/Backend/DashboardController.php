<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function Ramsey\Uuid\v1;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }


    public function dashboard()
    {
        $prod_count = Product::count();
        $brand_count = Brand::count();
        $cat_count = Category::count();
        $user_count = User::count();
        return view('backend.pages.dashboard.dashboard', compact('prod_count', 'brand_count', 'cat_count', 'user_count'));
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
