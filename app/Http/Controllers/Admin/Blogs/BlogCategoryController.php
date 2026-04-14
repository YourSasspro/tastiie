<?php

namespace App\Http\Controllers\Admin\Blogs;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ],[
            'name.required' => __('validation.required', ['attribute' => __('gen.name')]),
            'name.string' => __('validation.string', ['attribute' => __('gen.name')]),
            'name.max' => __('validation.max.string', ['attribute' => __('gen.name'), 'max' => 255]),
        ]);

        $category = new BlogCategory();
        $category->name = $request->name;
        $category->slug = $category->setUniqueSlug($request->name);
        $category->created_by = getAuthUserId();
        $category->updated_by = getAuthUserId();
        $category->save();

        return redirect()->route('admin.blog-categories.index')
            ->with('message', __('gen.created_successfully', ['attribute' => __('gen.category')]));
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
    public function edit(string $id)
    {
        $blogCategories = BlogCategory::findOrFail($id);
        if (!$blogCategories) {
            return redirect()->route('admin.blog-categories.index')
                ->with('error', __('gen.not_found', ['attribute' => __('gen.category')]));
        }
        return view('admin.blogs.categories.edit', compact('blogCategories'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $blogCategories = BlogCategory::findOrFail($id);
        if (!$blogCategories) {
            return redirect()->route('admin.blog-categories.index')
                ->with('error', __('gen.not_found', ['attribute' => __('gen.category')]));
        }
        $blogCategories->name = $request->name;
        $blogCategories->slug = $blogCategories->updateSlug($request->name);
        $blogCategories->updated_by = getAuthUserId();
        $blogCategories->save();

        return redirect()->route('admin.blog-categories.index')
            ->with('message', __('gen.updated_successfully', ['attribute' => __('gen.category')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blogCategories = BlogCategory::findOrFail($id);
        $blogCategories->delete();
        return redirect()->route('admin.blog-categories.index')
            ->with('message', __('gen.deleted_successfully', ['attribute' => __('gen.category')]));
    }
}
