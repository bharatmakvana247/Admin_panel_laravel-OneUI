<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //

    public function create()
    {
        dd("create");
    }

    public function index(Request $request)
    {
        dd($request->all());
    }

    public function edit($id, Request $request)
    {
        dd("edit", $id);
    }

    public function update($id, Request $request)
    {
        dd("updt", $id);
    }

    public function delete($id)
    {
        dd("dlt", $id);
    }
}