<?php

namespace App\Http\Controllers\Admin\UserAccessControl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Cache::remember('roles_list', 2880, function () {
            return Role::all();
        });

        return view('admin.uac.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::pluck('name', 'id');
        return view('admin.uac.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'permissions' => 'required',
        ], [
            'name.required' => __('validation.required', ['attribute' => __('gen.name')]),
            'name.string' => __('validation.string', ['attribute' => __('gen.name')]),
            'name.max' => __('validation.max.string', ['attribute' => __('gen.name'), 'max' => 255]),
            'name.unique' => __('validation.unique', ['attribute' => __('gen.name')]),
            'permissions.required' => __('validation.required', ['attribute' => __('gen.permissions')]),
            'permissions.array' => __('validation.array', ['attribute' => __('gen.permissions')]),
            'permissions.*.exists' => __('validation.exists', ['attribute' => __('gen.permissions')]),
        ]);

        $request->merge([
            'permissions' => explode(',', $request->permissions)
        ]);

        $role = Role::create(['name' => $request->name]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        Cache::forget('roles_list'); // Clear cache

        return to_route('roles.index')
            ->with([
                'message' => __('gen.created_successfully', ['attribute' => __('gen.role')]),
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
    public function edit(Role $role)
    {
        $permissions = Permission::pluck('name', 'id');
        $role->load('permissions');
        return view('admin.uac.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id,
            'permissions' => 'required',
        ], [
            'name.required' => __('validation.required', ['attribute' => __('gen.name')]),
            'name.string' => __('validation.string', ['attribute' => __('gen.name')]),
            'name.max' => __('validation.max.string', ['attribute' => __('gen.name'), 'max' => 255]),
            'name.unique' => __('validation.unique', ['attribute' => __('gen.name')]),
            'permissions.required' => __('validation.required', ['attribute' => __('gen.permissions')]),
            'permissions.array' => __('validation.array', ['attribute' => __('gen.permissions')]),
            'permissions.*.exists' => __('validation.exists', ['attribute' => __('gen.permissions')]),
        ]);

        $request->merge([
            'permissions' => explode(',', $request->permissions)
        ]);

        $role = Role::findOrFail($id);
        $role->update(['name' => $request->name]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        Cache::forget('roles_list'); // Clear cache

        return to_route('roles.index')
            ->with([
                'message' => __('gen.updated_successfully', ['attribute' => __('gen.role')]),
                'type' => 'success'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        Cache::forget('roles_list'); // Clear cache

        return to_route('roles.index')
            ->with([
                'message' => __('gen.deleted_successfully', ['attribute' => __('gen.role')]),
                'type' => 'success'
            ]);
    }
}
