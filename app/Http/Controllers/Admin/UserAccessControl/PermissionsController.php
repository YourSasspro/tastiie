<?php

namespace App\Http\Controllers\Admin\UserAccessControl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Cache::remember('permissions_list', 60, function () {
            return Permission::all();
        });

        return view('admin.uac.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.uac.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions',
        ], [
            'name.required' => __('validation.required', ['attribute' => __('gen.name')]),
            'name.string' => __('validation.string', ['attribute' => __('gen.name')]),
            'name.max' => __('validation.max.string', ['attribute' => __('gen.name'), 'max' => 255]),
            'name.unique' => __('validation.unique', ['attribute' => __('gen.name')]),
        ]);

        Permission::create(['name' => $request->name]);

        Cache::forget('permissions_list');

        return to_route('permissions.index')
            ->with([
                'message' =>  __('gen.created_successfully', ['attribute' => __('gen.permission')]),
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
    public function edit(Permission $permission)
    {
        return view('admin.uac.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $id,
        ], [
            'name.required' => __('validation.required', ['attribute' => __('gen.name')]),
            'name.string' => __('validation.string', ['attribute' => __('gen.name')]),
            'name.max' => __('validation.max.string', ['attribute' => __('gen.name'), 'max' => 255]),
            'name.unique' => __('validation.unique', ['attribute' => __('gen.name')]),
        ]);

        Permission::find($id)->update(['name' => $request->name]);

        Cache::forget('permissions_list');

        return to_route('permissions.index')
            ->with([
                'message' => __('gen.updated_successfully', ['attribute' => __('gen.permission')]),
                'type' => 'success'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Permission::destroy($id);

        Cache::forget('permissions_list');

        return to_route('permissions.index')
            ->with([
                'message' =>  __('gen.deleted_successfully', ['attribute' => __('gen.permission')]),
                'type' => 'success'
            ]);
    }
}
