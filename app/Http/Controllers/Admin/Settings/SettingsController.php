<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralSettingRequest;
use App\Models\GeneralSetting;
use App\Models\SocialLinks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    /**
     * Display the general settings.
     *
     * @return \Illuminate\View\View
     */
    public function gereralSetting()
    {
        $generalSetting = Cache::remember('general_setting', 60 * 60 * 24, function () {
            return GeneralSetting::first();
        });
        return view('admin.settings.index', compact('generalSetting'));
    }

    /**
     * Update the general settings
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function updateGeneralSetting(GeneralSettingRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('site_logo')) {
            $data['site_logo'] = $request->file('site_logo')->store('setting/site_logo/', 'public');
        }

        if ($request->hasFile('site_favicon')) {
            $data['site_favicon'] = $request->file('site_favicon')->store('settings/site_favicon/', 'public');
        }

        // Find the first record or create a new one
        $generalSetting = GeneralSetting::firstOrNew(['id' => 1]);
        $generalSetting->fill($data);

        // Set created_by only if it's a new record
        if (!$generalSetting->exists) {
            $generalSetting->created_by = getAuthUserId();
        }

        // Always update updated_by
        $generalSetting->updated_by = getAuthUserId();

        $generalSetting->save();

        Cache::forget('general_setting');

        return redirect()->back()
            ->with([
                'message' =>  __('gen.updated_successfully', ['attribute' => __('gen.general_settings')]),
                'type' => 'success',
            ]);
    }

    /**
     * Display the social settings.
     * 
     * @return \Illuminate\View\View
     */
    public function socialSetting()
    {
        $platForms = [
            ['name' => __('Facebook')],
            ['name' => __('Twitter')],
            ['name' => __('Instagram')],
            ['name' => __('LinkedIn')],
            ['name' => __('YouTube')],
            ['name' => __('Pinterest')],
            ['name' => __('Snapchat')],
            ['name' => __('TikTok')],
        ];

        $settingSocialLinks = Cache::remember('settings_social_links', 60 * 60 * 24, function () {
            return SocialLinks::where('key', 'settings_social_links')->get();
        });

        return view('admin.settings.social-links', compact('platForms', 'settingSocialLinks'));
    }

    /**
     * Update the social settings
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function updateSocialSetting(Request $request)
    {
        $data = $request->validate([
            'platform' => 'required',
            'link' => 'required|url',
            'key' => 'nullable',
        ], [
            'platform.required' => trans('validation.required', ['attribute' => trans('gen.platform_name')]),
            'link.required' => trans('validation.required', ['attribute' => trans('gen.platform_link')]),
            'link.url' => trans('validation.url', ['attribute' => trans('gen.platform_link')]),
        ]);

        // Find the first record or create a new one
        $socialLink = SocialLinks::firstOrNew(['platform' => $data['platform']]);
        $socialLink->fill($data);

        // Set created_by only if it's a new record
        if (!$socialLink->exists) {
            $socialLink->created_by = getAuthUserId();
        }

        // Always update updated_by
        $socialLink->updated_by = getAuthUserId();

        $socialLink->save();

        Cache::forget('settings_social_links');

        return redirect()->back()
            ->with([
                'message' =>  __('gen.updated_successfully', ['attribute' => __('gen.social_links_settings')]),
                'type' => 'success',
            ]);
    }

    /**
     * Delete the social settings
     * 
     * @param \App\Models\SocialLinks $socialLink
     * @return \Illuminate\View\View
     */
    public function deleteSocialSetting(SocialLinks $socialLink)
    {
        $socialLink->delete();

        Cache::forget('settings_social_links');

        return redirect()->back()
            ->with([
                'message' => __('gen.deleted_successfully', ['attribute' => __('gen.social_links_settings')]),
                'type' => 'success',
            ]);
    }

    /**
     * Display the profile settings.
     * 
     * @return \Illuminate\View\View
     */
    public function profileSetting()
    {
        return view('admin.settings.profile');
    }

    /**
     * Update the profile settings
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
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
