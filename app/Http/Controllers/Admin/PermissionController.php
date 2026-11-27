<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::orderBy('module_name', 'desc')
            ->paginate(10);

        return view('admin.permissions.index')->with('permissions', $permissions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'module_name' => 'required|in:Dashboard,Jobs,Permissions,Roles',
                'name' => 'required|string|max:255|unique:permissions,name',
            ],
            [
                'module_name.required' => 'Please select a module.',
                'module_name.in' => 'Please select a valid module.',
                'name.required' => 'Permission name is required.',
                'name.string' => 'Permission name must be a valid string.',
                'name.max' => 'Permission name cannot exceed 255 characters.',
                'name.unique' => 'This permission name already exists.',
            ]
        );

        Permission::create($validatedData);

        return redirect()->route('admin.permissions.index')->with('success', 'Permission created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit')->with('permission', $permission);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $validatedData = $request->validate(
            [
                'module_name' => [
                    'required',
                    'in:Dashboard,Jobs,Permissions,Roles'
                ],
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('permissions', 'name')->ignore($permission->id),
                ],
            ],
            [
                'module_name.required' => 'Please select a module.',
                'module_name.in' => 'Please select a valid module.',
                'name.required' => 'Permission name is required.',
                'name.string' => 'Permission name must be a valid string.',
                'name.max' => 'Permission name cannot exceed 255 characters.',
                'name.unique' => 'This permission name already exists.',
            ]
        );

        $permission->update($validatedData);

        return redirect()->route('admin.permissions.index')->with('success', 'Permission updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
