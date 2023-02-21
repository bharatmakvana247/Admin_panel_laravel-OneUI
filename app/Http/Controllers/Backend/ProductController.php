<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Exception, Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Filesystem\FilesystemAdapter;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function create()
    {
        $form_title = "Product";
        $category_list = Category::pluck('category_name', 'category_id');
        $brands_list = Brand::pluck('brand_name', 'brand_id');
        return view('backend.pages.product.create', compact('form_title', 'brands_list', 'category_list'));
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $products = Product::orderBy('product_id', 'desc');
            return DataTables::of($products)->addIndexColumn()
                ->addColumn('category_id', function (Product $products) {
                    if (!empty($products->category->category_name)) {
                        return $products->category->category_name; //Product->Category->CategoryName
                    } else {
                        return 'N/A';
                    }
                })
                ->addColumn('brand_id', function (Product $products) {
                    if (!empty($products->brand->brand_name)) {
                        return $products->brand->brand_name;
                    } else {
                        return 'N/A';
                    }
                })
                ->addColumn('productDetails', function (Product $products) {
                    // return $products->product_details;
                    return  Str::limit($products->product_details, 25);
                })
                ->addColumn('productimage', function (Product $products) {
                    if (!empty($products->product_image)) {
                        return '<img src=' . url("storage/productImage/$products->product_image") . '  width="80%" height="50%" class="img-rounded" align="center" />';
                    } else {
                        return '<img src=' . url("storage/productImage/default.png") . '  width="70%" height="40%" class="img-rounded" align="center" />';
                    }
                })
                ->addColumn('action', function (Product $product) {
                    $action  = '';
                    $action .= '<a class="btn btn-warning btn-circle btn-sm" href=' . route('admin.product.edit', [$product->product_id]) . '><i class="fa fa-pencil" data-toggle="tooltip" title="Edit"></i></a>';
                    $action .= '<a class="btn btn-danger btn-circle btn-sm m-l-10 ml-1 mr-1" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" data-id=' .  route('admin.product.delete', [$product->product_id]) . ' onclick="deleteAlert(event)"></i></a>';
                    $action .= '<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm Showpromo" data-id="' . '' . '" data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>';
                    return $action;
                })
                ->rawColumns(['action', 'category_id', 'brand_id', 'productimage', 'productDetails'])
                ->make(true);
        }
        return view('backend.pages.product.index');
    }

    public function store(Request $request)
    {
        $customMessages = [
            'product_name.required' => 'Please Enter Product name.',
            'product_details.required' => 'Please Enter product_details.',
            'product_price.required' => 'Please Enter product_price.',
            'product_qty.required' => 'Please Enter product_qty.',
            'product_image.required' => 'Please Enter Image.'
        ];
        $validatedData = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_details' => 'required',
            'product_price' => 'required',
            'product_qty' => 'required',
            'product_image' => 'required',
            'brand_name' => 'required',
            'category_name'  => 'required'
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        try {
            if ($request->hasFile('product_image')) {
                $file = $request->file('product_image');
                if ($file->isValid()) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = $file->getClientOriginalName();
                    $filesystem = Storage::disk('public');
                    $filesystem->putFileAs('productImage', $file, $filename);
                }
            }
            Product::create([
                'product_name' => $request->get('product_name'),
                'category_name' => $request->get('category_name'),
                'brand_id' => $request->get('brand_name'),
                'product_details' => $request->get('product_details'),
                'product_price' => $request->get('product_price'),
                'product_qty' => $request->get('product_qty'),
                'product_image' => $filename,
            ]);
            smilify('success', 'Product Added. ⚡️');
            return redirect()->route('admin.product.index');
        } catch (Exception $e) {
            smilify('error', 'Sorry Product was not Added.');
            return redirect()->back();
        }
    }

    function edit($id, Request $request)
    {
        $form_title = "Product";
        $product = Product::where('product_id', $id)->first();
        $category_name = Category::pluck('category_name', 'category_id');
        $brand_name = Brand::pluck('brand_name', 'brand_id');
        return view('backend.pages.product.edit', compact('form_title', 'product', 'category_name', 'brand_name'));
    }


    function update(Request $request, $id)
    {
        $customMessages = [
            'product_name.required' => 'Please Enter Product name.',
            'product_details.required' => 'Please Enter product_details.',
            'product_price.required' => 'Please Enter product_price.',
            'product_qty.required' => 'Please Enter product_qty.',
            // 'product_image.required' => 'Please Enter Image.'
        ];
        $validatedData = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_details' => 'required',
            'product_price' => 'required',
            'product_qty' => 'required',
            // 'product_image' => 'required',
            'brand_name' => 'required',
            'category_name'  => 'required'
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        try {
            $oldDetails = Product::where('product_id', $id)->first();
            if ($request->hasFile('product_image')) {
                $file = $request->file('product_image');
                $filename = $file->getClientOriginalName();
                $filesystem = Storage::disk('public');
                $filesystem->putFileAs('productImage', $file, $filename);
            } else {
                if (!empty($oldDetails->product_image)) {
                    $filename = $oldDetails->product_image;
                } else {
                    $filename = 'default.png';
                }
            }
            Product::where('product_id', $id)->update([
                'product_name' => $request->get('product_name'),
                'category_name' => $request->get('category_name'),
                'brand_id' => $request->get('brand_name'),
                'product_details' => $request->get('product_details'),
                'product_price' => $request->get('product_price'),
                'product_qty' => $request->get('product_qty'),
                'product_image' => $filename,
            ]);
            smilify('success', 'Product Updated. ⚡️');
            return redirect()->route('admin.product.index');
        } catch (Exception $e) {
            smilify('error', 'Sorry Product was not Updated.');
            return redirect()->back();
        }
    }

    function delete($id)
    {
        $product_dlt = Product::where('product_id', $id)->first();
        $product_dlt->delete();
        smilify('success', 'Product Deleted. ⚡️');
        return redirect()->route('admin.product.index');
    }
}
