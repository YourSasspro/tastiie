<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CkeditorController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $image = $request->file('upload');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('uploads'), $imageName);

        return response()->json([
            'uploaded' => true,
            'url' => asset('uploads/' . $imageName),
        ]);
    }
}
