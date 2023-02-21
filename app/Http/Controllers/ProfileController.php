<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //
    public function editProfile()
    {
        $form_title = "Profile";
        return view('backend.pages.profile.edit', compact('form_title'));
    }

    public function updateProfile(Request $request, $id)
    {
        try {
            $oldDetails = User::where('id', $id)->get();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $filesystem = Storage::disk('public');
                $filesystem->putFileAs('productImage', $file, $filename);
            } else {
                if (!empty($oldDetails->image)) {
                    $filename = $oldDetails->image;
                } else {
                    $filename = 'default.png';
                }
            }
            dd($filename);
            User::where('product_id', $id)->update([]);
            smilify('success', 'Product Updated. ⚡️');
            return redirect()->route('admin.product.index');
        } catch (Exception $e) {
            dd($e);
            smilify('error', 'Sorry Product was not Updated.');
            return redirect()->back();
        }
    }
}
