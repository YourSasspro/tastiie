<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function profile()
    {
        return view('web.user.settings.profile');
    }

    public function updateProfileImage(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'image.required' => trans('validation.required', ['attribute' => trans('gen.image')]),
            'image.image' => trans('validation.image', ['attribute' => trans('gen.image')]),
            'image.mimes' => trans('validation.mimes', ['attribute' => trans('gen.image')]),
            'image.max' => trans('validation.max.file', ['attribute' => trans('gen.image')]),
        ]);

        $data['image'] = $request->file('image')->store('profile/', 'public');

        // Delete old image
        if (getAuthUser()->image) {
            Storage::disk('public')->delete(getAuthUser()->image);
        }

        getAuthUser()->image = $data['image'];
        getAuthUser()->save();

        return redirect()->back()
            ->with([
                'message' => __('gen.updated_successfully', ['attribute' => __('gen.image')]),
                'type' => 'success',
            ]);
    }
}
