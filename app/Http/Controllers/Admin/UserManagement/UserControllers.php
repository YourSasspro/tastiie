<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Events\UserCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = Cache::remember('users_list', 120, function () {
            return User::all();
        });

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();

        // Handle optional image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('users/images', 'public');
        }

        // Create the user
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'image' => $data['image'] ?? null,
            'phone_number' => $data['phone_number'],
        ]);

        // Assign role using Spatie permissions
        $user->assignRole($data['role']);

        return to_route('users.index')
            ->with([
                'message' => __('gen.created_successfully', ['attribute' => __('gen.user')]),
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
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id');
        $user->load('roles');
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();

        // Handle optional image upload
        if ($request->hasFile('image')) {
            // Store the new image and update the data array
            $data['image'] = $request->file('image')->store('users/images', 'public');

            // Delete the old image if it exists
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
        }

        // Handle password update if null
        if (is_null($data['password'] ?? null)) {
            unset($data['password'], $data['password_confirmation']);
        }

        // Update the user
        $user->update($data);

        // Assign role using Spatie permissions
        $user->syncRoles($request->role);

        return to_route('users.index')
            ->with([
                'message' => __('gen.updated_successfully', ['attribute' => __('gen.user')]),
                'type' => 'success'
            ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        $user->delete();

        return to_route('users.index')
            ->with([
                'message' => __('gen.deleted_successfully', ['attribute' => __('gen.user')]),
                'type' => 'success'
            ]);
    }
}
