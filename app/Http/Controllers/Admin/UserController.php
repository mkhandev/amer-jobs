<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Users List', only: ['index']),
            new Middleware('permission:Users Add', only: ['create', 'store']),
            new Middleware('permission:Users Edit', only: ['edit', 'update']),
        ];
    }

    public function index()
    {
        $users = User::orderBy('id', 'desc')->where('user_type', 1)->paginate(10);
        return view('admin.users.index')->with('users', $users);
    }

    public function create()
    {
        $roles = Role::get();
        return view('admin.users.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        // 1. Validate form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'roles' => 'required|array',
            'roles.*' => 'required|string|exists:roles,name',
        ], [
            'name.required' => 'Please enter user name.',
            'email.required' => 'Please enter email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Please enter password.',
            'password.min' => 'Password must be at least 6 characters.',
            'roles.required' => 'Please select role.',
            'roles.*.exists' => 'One or more selected roles are invalid.',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'user_type' => 1,
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        if (!empty($validatedData['roles'])) {
            //$user->syncRoles($validatedData['roles']);
            $user->assignRole($validatedData['roles']);
        }

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User created successfully!');
    }

    public function edit(User $user)
    {
        $roles = Role::orderBy('name')->get();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'roles' => 'nullable|array',
            'roles.*' => 'required|string|exists:roles,name',
        ], [
            'name.required' => 'Please enter user name.',
            'email.required' => 'Please enter email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.min' => 'Password must be at least 6 characters.',
            'roles.*.exists' => 'One or more selected roles are invalid.',
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        $user->syncRoles($validatedData['roles'] ?? []);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User updated successfully!');
    }
}
