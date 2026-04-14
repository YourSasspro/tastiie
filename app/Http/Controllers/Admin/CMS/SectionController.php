<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Traits\UpdateImage;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    use UpdateImage;
    public function getLandingPage()
    {
        $landingPageSection = Section::where('key', Section::$landingPageKey)->first();
        return view('admin.cms.landing-page.edit', compact('landingPageSection'));
    }

    public function updateLandingPage(Request $request)
    {
        $request->validate([
            'services' => 'required|array',
            'services.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'services.*.title' => 'required|string',
            'services.*.description' => 'required|string',
        ],[
            'services.*.image.image' => __('validation.image', ['attribute' => __('gen.image')]),
            'services.*.image.mimes' => __('validation.mimes', ['attribute' => __('gen.image'), 'values' => 'jpeg, png, jpg, gif, svg']),
            'services.*.image.max' => __('validation.max.file', ['attribute' => __('gen.image'), 'max' => '2MB']),
            'services.*.title.required' => __('validation.required', ['attribute' => __('gen.service_title')]),
            'services.*.title.string' => __('validation.string', ['attribute' => __('gen.service_title')]),
            'services.*.description.required' => __('validation.required', ['attribute' => __('gen.service_description')]),
            'services.*.description.string' => __('validation.string', ['attribute' => __('gen.service_description')]),
        ]);

        $oldLandingPageSection = Section::where('key', Section::$landingPageKey)->first();
        $extraData = isset($oldLandingPageSection->extra_data) ? json_decode($oldLandingPageSection->extra_data, true) : [];

        $services = [];
        foreach ($request->services as $key => $service) {
            $serviceImage = $this->handleImageUpload($request, "services.{$key}.image", $extraData['services'][$key]['image'] ?? null,'cms/images');
            $services[] = [
                'image' => $serviceImage,
                'title' => $service['title'],
                'description' => $service['description'],
                'sub_description' => $service['sub_description'],
            ];
        }

        $landingPage = [
            'title' => 'Landing Page',
            'description' => 'Landing Page Description',
            'extra_data' => json_encode([
                'services' => $services,
            ]),
            'created_by' => getAuthUserId(),
            'updated_by' => getAuthUserId(),
        ];

        Section::updateOrCreate(['key' => Section::$landingPageKey], $landingPage);

        return redirect()->back()->with('message', 'Landing Page Updated Successfully');
    }

    public function getBlogPage()
    {
        $blogPageSection = Section::where('key', Section::$blogPage)->first();
        return view('admin.cms.blog-page.edit', compact('blogPageSection'));
    }

    public function updateBlogPage(Request $request){
        $request->validate([
            'hero_section_heading' => 'required|string',
            'hero_section_video' => 'nullable|file|mimes:mp4,webm,ogg|max:2048',
            'hero_section_description' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'service_title' => 'required|string',
            'service_description' => 'required|string',
        ],[
            'hero_section_heading.required' => __('validation.required', ['attribute' => __('gen.heading')]),
            'hero_section_heading.string' => __('validation.string', ['attribute' => __('gen.heading')]),
            'hero_section_video.file' => __('validation.file', ['attribute' => __('gen.video')]),
            'hero_section_video.mimes' => __('validation.mimes', ['attribute' => __('gen.video'), 'values' => 'mp4, webm, ogg']),
            'hero_section_video.max' => __('validation.max.file', ['attribute' => __('gen.video'), 'max' => '2MB']),
            'hero_section_description.required' => __('validation.required', ['attribute' => __('gen.sub_description')]),
            'hero_section_description.string' => __('validation.string', ['attribute' => __('gen.sub_description')]),
            'title.required' => __('validation.required', ['attribute' => __('gen.title')]),
            'title.string' => __('validation.string', ['attribute' => __('gen.title')]),
            'description.required' => __('validation.required', ['attribute' => __('gen.description')]),
            'description.string' => __('validation.string', ['attribute' => __('gen.description')]),
            'service_title.required' => __('validation.required', ['attribute' => __('gen.service_title')]),
            'service_title.string' => __('validation.string', ['attribute' => __('gen.service_title')]),
            'service_description.required' => __('validation.required', ['attribute' => __('gen.service_description')]),
            'service_description.string' => __('validation.string', ['attribute' => __('gen.service_description')]),
        ]);

        $oldBlogPageSection = Section::where('key', Section::$blogPage)->first();
        $oldExtraData = isset($oldBlogPageSection->extra_data) ? json_decode($oldBlogPageSection->extra_data, true) : [];
        $video = $this->handleImageUpload($request, 'hero_section_video', $oldExtraData['hero_section_video'] ?? null, 'cms/videos');
        $extraData = [
            'hero_section_heading' => $request->hero_section_heading,
            'hero_section_video' => $video,
            'hero_section_description' => $request->hero_section_description,
            'service_title' => $request->service_title,
            'service_description' => $request->service_description,
        ];

        Section::updateOrCreate(
            ['key' => Section::$blogPage],
            [
                'title' => $request->title,
                'description' => $request->description,
                'extra_data' => json_encode($extraData),
                'created_by' => getAuthUserId(),
                'updated_by' => getAuthUserId(),
            ]
        );

        return redirect()->back()->with('message', __('gen.updated_successfully' , ['attribute' => __('gen.blog_page')]));

    }


    public function getPrivacyPolicy(){
        $privacyPolicy = Section::where('key', Section::$privacyPolicy)->first();
        return view('admin.cms.privacy-policy.index',compact('privacyPolicy'));
    }

    public function updatePrivacyPolicy(Request $request){
        $request->validate([
            'content' => 'required|string',
        ],[
            'content.required' => __('validation.required', ['attribute' => __('gen.content')]),
            'content.string' => __('validation.string', ['attribute' => __('gen.content')]),
        ]);

        $privacyPolicy = Section::updateOrCreate(
            ['key' => Section::$privacyPolicy],
            [
                'title' => 'Privacy Policy',
                'description' => 'Privacy Policy Description',
                'extra_data' => json_encode(['content' => $request->content]),
                'created_by' => getAuthUserId(),
                'updated_by' => getAuthUserId(),
            ]
        );

        return redirect()->back()->with('message', __('gen.updated_successfully' , ['attribute' => __('gen.privacy_policy')]));
    }


    public function getTermsAndConditions(){
        $termsAndConditions = Section::where('key', Section::$termsAndConditions)->first();
        return view('admin.cms.terms-and-conditions.index',compact('termsAndConditions'));
    }


    public function updateTermsAndConditions(Request $request){
        $request->validate([
            'content' => 'required|string',
        ],[
            'content.required' => __('validation.required', ['attribute' => __('gen.content')]),
            'content.string' => __('validation.string', ['attribute' => __('gen.content')]),
        ]);

        $termsAndConditions = Section::updateOrCreate(
            ['key' => Section::$termsAndConditions],
            [
                'title' => 'Terms and Conditions',
                'description' => 'Terms and Conditions Description',
                'extra_data' => json_encode(['content' => $request->content]),
                'created_by' => getAuthUserId(),
                'updated_by' => getAuthUserId(),
            ]
        );

        return redirect()->back()->with('message', __('gen.updated_successfully' , ['attribute' => __('gen.terms_and_conditions')]));
    }


    public function getWhoWeAre(){
        $whoWeAre = Section::where('key',Section::$whoWeAre)->first();
        // dd($whoWeAre);
        return view('admin.cms.who-we-are.edit',compact('whoWeAre'));
    }

    public function updateWhoWeAre(Request $request){
        $request->validate([
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'hero_image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'section_2_heading' => 'required|string',
            'section_2_description' => 'required|string',
            'section_2_title' => 'required|string',
            'section_2_sub_title' => 'required|string',
            'section_2_image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'section_3_heading' => 'required|string',
            'section_3_image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'section_3_description' => 'required|string',
        ],[
            'title.required' => __('validation.required', ['attribute' => __('gen.title')]),
            'title.string' => __('validation.string', ['attribute' => __('gen.title')]),
            'sub_title.required' => __('validation.required', ['attribute' => __('gen.sub_title')]),
            'sub_title.string' => __('validation.string', ['attribute' => __('gen.sub_title')]),
            'hero_image.image' => __('validation.image', ['attribute' => __('gen.image')]),
            'hero_image.mimes' => __('validation.mimes', ['attribute' => __('gen.image'), 'values' => 'png, jpg, jpeg']),
            'hero_image.max' => __('validation.max.file', ['attribute' => __('gen.image'), 'max' => '2MB']),
            'section_2_heading.required' => __('validation.required', ['attribute' => __('gen.heading')]),
            'section_2_heading.string' => __('validation.string', ['attribute' => __('gen.heading')]),
            'section_2_description.required' => __('validation.required', ['attribute' => __('gen.description')]),
            'section_2_description.string' => __('validation.string', ['attribute' => __('gen.description')]),
            'section_2_sub_title.required' => __('validation.required', ['attribute' => __('gen.sub_title')]),
            'section_2_sub_title.string' => __('validation.string', ['attribute' => __('gen.sub_title')]),
            'section_2_image.image' => __('validation.image', ['attribute' => __('gen.image')]),
            'section_2_image.mimes' => __('validation.mimes', ['attribute' => __('gen.image'), 'values' => 'png, jpg, jpeg']),
            'section_2_image.max' => __('validation.max.file', ['attribute' => __('gen.image'), 'max' => '2MB']),
            'section_3_heading.required' => __('validation.required', ['attribute' => __('gen.heading')]),
            'section_3_heading.string' => __('validation.string', ['attribute' => __('gen.heading')]),
            'section_3_image.image' => __('validation.image', ['attribute' => __('gen.image')]),
            'section_3_image.mimes' => __('validation.mimes', ['attribute' => __('gen.image'), 'values' => 'png, jpg, jpeg']),
            'section_3_image.max' => __('validation.max.file', ['attribute' => 'image', 'max' => '2MB']),
            'section_3_description.required' => __('validation.required', ['attribute' => __('gen.description')]),
            'section_3_description.string' => __('validation.string', ['attribute' => __('gen.description')]),
        ]);

        $oldWhoWeAre = Section::where('key', Section::$whoWeAre)->first();
        $oldExtraData = isset($oldWhoWeAre->extra_data) ? json_decode($oldWhoWeAre->extra_data, true) : [];
        $heroImage = $this->handleImageUpload($request, 'hero_image', $oldExtraData['hero_image'] ?? null, 'cms/images');
        $section2Image = $this->handleImageUpload($request, 'section_2_image', $oldExtraData['section_2_image'] ?? null, 'cms/images');
        $section3Image = $this->handleImageUpload($request, 'section_3_image', $oldExtraData['section_3_image'] ?? null, 'cms/images');

        $extraData = [
            'sub_title' => $request->sub_title,
            'hero_image' => $heroImage,
            'section_2_heading' => $request->section_2_heading,
            'section_2_description' => $request->section_2_description,
            'section_2_title' => $request->section_2_title,
            'section_2_sub_title' => $request->section_2_sub_title,
            'section_2_image' => $section2Image,
            'section_3_heading' => $request->section_3_heading,
            'section_3_image' => $section3Image,
            'section_3_description' => $request->section_3_description,
        ];

        $whoWeAre = Section::updateOrCreate(
            ['key' => Section::$whoWeAre],
            [
                'title' => $request->title,
                'description' => 'Who We Are Description',
                'extra_data' => json_encode($extraData),
                'created_by' => getAuthUserId(),
                'updated_by' => getAuthUserId(),
            ]
        );

        return redirect()->back()->with('message', __('gen.updated_successfully' , ['attribute' => __('gen.who_we_are')]));
    }

    public function getBecomeALeader(){
        $becomeALeader = Section::where('key', Section::$becomeALeader)->first();
        return view('admin.cms.become-a-leader.edit',compact('becomeALeader'));
    }


    public function updateBecomeALeader(Request $request){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'services' => 'required|array',
            'services.*.icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'services.*.title' => 'required|string',
            'services.*.desc' => 'required|string',
            'section_2_title' => 'required|string',
            'section_2_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'clients' => 'required|array',
            'clients.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'title.required' => __('validation.required', ['attribute' => __('gen.title')]),
            'title.string' => __('validation.string', ['attribute' => __('gen.title')]),
            'description.required' => __('validation.required', ['attribute' => __('gen.description')]),
            'services.*.icon.image' => __('validation.image', ['attribute' => __('gen.image')]),
            'services.*.icon.mimes' => __('validation.mimes', ['attribute' => __('gen.image'), 'values' => 'jpeg, png, jpg, gif, svg']),
            'services.*.icon.max' => __('validation.max.file', ['attribute' => __('gen.image'), 'max' => '2MB']),
            'services.*.title.required' => __('validation.required', ['attribute' => __('gen.service_title')]),
            'services.*.title.string' => __('validation.string', ['attribute' => __('gen.service_title')]),
            'services.*.desc.required' => __('validation.required', ['attribute' => __('gen.service_description')]),
            'services.*.desc.string' => __('validation.string', ['attribute' => __('gen.service_description')]),
            'section_2_title.required' => __('validation.required', ['attribute' => __('gen.title')]),
            'section_2_title.string' => __('validation.string', ['attribute' => __('gen.title')]),
            'section_2_image.image' => __('validation.image', ['attribute' => __('gen.image')]),
            'section_2_image.mimes' => __('validation.mimes', ['attribute' => __('gen.image'), 'values' => 'jpeg, png, jpg, gif, svg']),
            'section_2_image.max' => __('validation.max.file', ['attribute' => __('gen.image'), 'max' => '2MB']),
            'clients.*.image.image' => __('validation.image', ['attribute' => __('gen.image')]),
            'clients.*.image.mimes' => __('validation.mimes', ['attribute' => __('gen.image'), 'values' => 'jpeg, png, jpg, gif, svg']),
            'clients.*.image.max' => __('validation.max.file', ['attribute' => __('gen.image'), 'max' => '2MB']),
        ]);

        $oldBecomeALeader = Section::where('key', Section::$becomeALeader)->first();
        $oldExtraData = isset($oldBecomeALeader->extra_data) ? json_decode($oldBecomeALeader->extra_data, true) : [];

        $services = [];
        foreach ($request->services as $key => $service) {
            $serviceIcon = $this->handleImageUpload($request, "services.{$key}.icon", $oldExtraData['services'][$key]['icon'] ?? null, 'cms/images');
            $services[] = [
                'icon' => $serviceIcon,
                'title' => $service['title'],
                'desc' => $service['desc'],
            ];
        }

        $section2Image = $this->handleImageUpload($request, 'section_2_image', $oldExtraData['section_2_image'] ?? null, 'cms/images');
        $clients = [];
        foreach ($request->clients as $key => $client) {
            // Check if a new image is uploaded
            if ($request->hasFile("clients.{$key}.image")) {
                $clientImage = $this->handleImageUpload($request, "clients.{$key}.image", null, 'cms/images');
            } else {
                $clientImage = $client['old_image'] ?? null; // Keep old image if no new file uploaded
            }

            $clients[] = [
                'image' => $clientImage,
            ];
        }

        $extraData = [
            'services' => $services,
            'section_2_title' => $request->section_2_title,
            'section_2_image' => $section2Image,
            'clients' => $clients,
        ];

        Section::updateOrCreate(
            ['key' => Section::$becomeALeader],
            [
                'title' => $request->title,
                'description' => $request->description,
                'extra_data' => json_encode($extraData),
                'created_by' => getAuthUserId(),
                'updated_by' => getAuthUserId(),
            ]
        );

        return redirect()->back()->with('message', __('gen.updated_successfully' , ['attribute' => __('gen.become_a_leader')]));

    }


}
