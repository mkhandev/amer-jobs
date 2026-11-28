<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Roles List', only: ['index', 'show']),
            new Middleware('permission:Roles Add', only: ['create', 'store']),
            new Middleware('permission:Roles Edit', only: ['edit', 'update']),
            new Middleware('permission:Roles Delete', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'desc')->paginate(10);
        return view('admin.roles.index')->with('roles', $roles);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::select('id', 'name', 'module_name')
            ->orderBy('id', 'ASC')
            ->get()
            ->groupBy('module_name');

        // echo '<pre>';
        // print_r($permissions);
        // exit;

        return view('admin.roles.create', [
            'rolePermission' => $permissions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'permission' => 'required|array',
            'permission.*' => 'required|string|exists:permissions,name',
        ], [
            'name.required' => 'Please enter a role name.',
            'name.string' => 'Role name must be a valid string.',
            'name.max' => 'Role name cannot exceed 255 characters.',
            'name.unique' => 'This role name already exists.',

            'permission.required' => 'Please select at least one permission.',
            'permission.array' => 'Invalid permission selection.',
            'permission.*.required' => 'Permission is required.',
            'permission.*.string' => 'Invalid permission format.',
            'permission.*.exists' => 'Selected permission does not exist.',
        ]);

        $role =  Role::create(['name' => $request->name]);

        $role->syncPermissions($validatedData['permission']);

        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::select('id', 'name', 'module_name')
            ->orderBy('id', 'ASC')
            ->get()
            ->groupBy('module_name');

        return view('admin.roles.edit', [
            'rolePermission' => $permissions,
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'permission' => 'required|array',
            'permission.*' => 'required|string|exists:permissions,name',
        ], [
            'name.required' => 'Please enter a role name.',
            'name.string' => 'Role name must be a valid string.',
            'name.max' => 'Role name cannot exceed 255 characters.',
            'name.unique' => 'This role name already exists.',

            'permission.required' => 'Please select at least one permission.',
            'permission.array' => 'Invalid permission selection.',
            'permission.*.required' => 'Permission is required.',
            'permission.*.string' => 'Invalid permission format.',
            'permission.*.exists' => 'Selected permission does not exist.',
        ]);

        // Update role name
        $role->update([
            'name' => $validatedData['name']
        ]);

        // Update role permissions
        $role->syncPermissions($validatedData['permission']);

        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        // Remove role-permission relationships
        //$role->permissions()->detach(); no need because role permission cascade delete

        $role->delete();

        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully!');
    }
}
