<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
        ],[
            'name.required' => __('validation.required',['attribute'=> trans('gen.name')]),
            'image.image' => __('validation.image',['attribute' => trans('gen.image')]),
            'image.mimes' => __('validation.mimes',['attribute' => trans('gen.image')]),
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->parent_id = 0;
        $category->position = 0;
        if ($request->hasFile('image')) {
            $category->image = $request->file('image')->store('category');
        }
        $category->save();

        return to_route('admin.categories.index')
            ->with([
                'message' => __('gen.created_successfully', ['attribute' => __('gen.category')]),
                'type' => 'success'
            ]);
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
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
        ],[
            'name.required' => __('validation.required',[' attribute' => __('gen.name')]),
            'image.image' => __('validation.image',['attribute' => __('gen.image')]),
            'image.mimes' => __('validation.mimes',['attribute' => __('gen.image')]),
        ]);

        $category->name = $request->name;
        if ($request->hasFile('image')) {
            $category->image = $request->file('image')->store('category');
        }
        $category->slug = $category->updateSlug($request->name);
        $category->status = $request->status;
        $category->save();

        return to_route('admin.categories.index')
            ->with([
                'message' => __('gen.updated_successfully', ['attribute' => __('gen.category')]),
                'type' => 'success'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('admin.categories.index')
            ->with([
                'message' => __('gen.deleted_successfully', ['attribute' => __('gen.category')]),
                'type' => 'success'
            ]);
    }
}
