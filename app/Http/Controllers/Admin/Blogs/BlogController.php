<?php

namespace App\Http\Controllers\Admin\Blogs;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BlogCategories;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('category')->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {   
        $data = $request->validated();
        // $data['image'] = $request->file('image')->store('blogs', 'public');
        // upload multiple images
        $images = [];
        if($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                $images[] = $image->store('blogs', 'public');
            }
        }
        $data['images'] = json_encode($images);
        
        $blog = new Blog();
        $blog->title = $data['title'];
        $blog->category_id = $data['category_id'];
        $blog->content = $data['content'];
        $blog->slug = $blog->setUniqueSlug($data['title']);
        $blog->images = $data['images'];
        $blog->created_by = getAuthUserId();
        $blog->updated_by = getAuthUserId();
        $blog->save();
        return redirect()->route('admin.blogs.index')->with('message', __('gen.created_successfully', ['attribute' => __('gen.blog')]));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */

        public function update(BlogRequest $request, Blog $blog)
    {
        $data = $request->validated();

        // if($request->hasFile('image')) {
        //     $blog->deleteImage();
        //     $data['image'] = $request->file('image')->store('blogs', 'public');
        // }
        // Handle multiple images
        $images = [];

        if ($request->hasFile('images')) {
            // Delete existing images
            $blog->deleteImages();

            foreach($request->file('images') as $image) {
                $images[] = $image->store('blogs', 'public');
            }
        }

        $data['images'] = !empty($images) ? json_encode($images) : $blog->images;
        // Update the blog post
        $blog->update([
            'title' => $data['title'],
            'category_id' => $data['category_id'],
            'content' => $data['content'],
            'images' => $data['images'],
            'slug' => $blog->updateSlug($data['title']),
            'updated_by' => getAuthUserId(),
        ]);

        return redirect()->route('admin.blogs.index')->with('message', __('gen.updated_successfully', ['attribute' => __('gen.blog')]));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->deleteImages();
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('message', __('gen.deleted_successfully', ['attribute' => __('gen.blog')]));
    }
}

