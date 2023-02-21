<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Storage;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function create()
    {
        $form_title = "Category";
        $brands_list = Brand::pluck('brand_name', 'brand_id');
        return view('backend.pages.category.create', compact('form_title', 'brands_list'));
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::with('brand')->orderBy('category_id', 'desc');
            return DataTables::of($categories)->addIndexColumn()
                ->editColumn('brand_id', function (Category $categories) {
                    return $categories->brand->brand_name;
                })
                ->addColumn('action', function () {
                    $actionBtn = '-';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'brand_id'])
                ->addColumn('action', function (Category $category) {
                    $action  = '';
                    $action .= '<a class="btn btn-warning btn-circle btn-sm" href=' . route('admin.category.edit', [$category->category_id]) . '><i class="fa fa-pencil" data-toggle="tooltip" title="Edit"></i></a>';
                    $action .= '<a class="btn btn-danger btn-circle btn-sm m-l-10 ml-1 mr-1" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" data-id=' .  route('admin.category.delete', [$category->category_id]) . ' onclick="deleteAlert(event)"></i></a>';
                    $action .= '<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm Showcategories" data-id="' . $category->category_id . '" data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>';
                    return $action;
                })
                ->make(true);
        }
        return view('backend.pages.category.index');
    }

    public function store(Request $request)
    {
        $customMessages = [
            'brand_name.required' => 'Please Enter Brand Name.',
            'category_name.required' => 'Please Enter Category Name.',
        ];
        $validatedData = Validator::make($request->all(), [
            'brand_name'  => 'required',
            'category_name'  => 'required'
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        Category::create([
            'category_name' => $request->get('category_name'),
            'brand_name' => $request->get('brand_name'),
        ]);

        smilify('success', 'Product Added. ⚡️');
        return redirect()->route('admin.category.index');
    }

    public function edit($id)
    {
        $form_title = "Category";
        $category = Category::where('category_id', $id)->first();
        $brands_list = Brand::pluck('brand_name', 'brand_id');
        return view('backend.pages.category.edit', compact('category', 'form_title', 'brands_list'));
    }

    public function update(Request $request, $id)
    {
        $customMessages = [
            'brand_name.required' => 'Please Enter Brand Name.',
            'category_name.required' => 'Please Enter Category Name.',
        ];
        $validatedData = Validator::make($request->all(), [
            'brand_name'  => 'required',
            'category_name'  => 'required'
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        Category::where('category_id', $id)->update([
            'category_name' => $request->get('category_name'),
            'brand_name' => $request->get('brand_name'),
        ]);

        smilify('success', 'Category Updated. ⚡️');
        return redirect()->route('admin.category.index');
    }

    public function delete($id)
    {
        $category_dlt = Category::where('category_id', $id)->first();
        $category_dlt->delete();
        smilify('success', 'Category Deleted. ⚡️');
        return redirect()->route('admin.category.index');
    }

    public function show(Request $request)
    {
        dd($request);
        $categories = Category::find($request->id);
        dd($categories);

        return redirect('admin.category.form');
        smilify('success', 'Category Deleted. ⚡️');
        return redirect()->route('admin.category.index');
    }
}