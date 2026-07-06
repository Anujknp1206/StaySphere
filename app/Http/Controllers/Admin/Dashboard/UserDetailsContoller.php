<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;


class UserDetailsContoller extends Controller
{
    // Show list of users (Read)
    public function index()
    {
        $u = Auth::user();
        $title = $u->name . ' | Dashboard';
        $users = User::all();
        $roles = Role::all();
        $setting = Setting::first();
        return view('admin.dashboard.userdetails.index', compact('users', 'roles', 'title', 'setting'));
    }

    // Show create form (Create)
    public function create()
    {

        $u = Auth::user();
        $title = $u->name . ' | Dashboard';
        $setting = Setting::first();
        return view('admin.dashboard.userdetails.create', compact('title', 'setting'));
    }

    // Store user data (Create)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
        } else {
            $path = null;
        }
        $u = Auth::user();
        $title = $u->name . ' | Dashboard';

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'photo' => $path,
        ]);
        $user->assignRole('admin');

        alert()->toast('User Added Successfully', 'success');
        return redirect()->route('users.index', compact('title'))->with('success', 'User created successfully');
    }

    // Show edit form (Update)
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $us = Auth::user();
        $setting = Setting::first();
        $title = $us->name . ' | Dashboard';
        return view('admin.dashboard.userdetails.edit', compact('user', 'title', 'setting'));
    }

    // Update user data (Update)
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $u = Auth::user();

        $title = $u->name . ' | Dashboard';
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $user->photo; // default to current photo

        if ($request->has('delete_photo')) {
            if ($user->photo && Storage::exists('public/' . $user->photo)) {
                Storage::delete('public/' . $user->photo);
            }
            $path = null; // Remove from DB too
        }

        if ($request->hasFile('photo')) {
            if ($user->photo && Storage::exists('public/' . $user->photo)) {
                Storage::delete('public/' . $user->photo);
            }
            $path = $request->file('photo')->store('photos', 'public');
        }


        // Update user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'photo' => $path,
        ]);
        alert()->toast('User Details Updated Successfully', 'success');
        return redirect()->route('users.index', compact('title'))->with('success', 'User updated successfully');
    }

    // Delete user (Delete)
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Delete photo if exists
        if ($user->photo && Storage::exists('public/' . $user->photo)) {
            Storage::delete('public/' . $user->photo);
        }
        $u = Auth::user();

        $title = $u->name . ' | Dashboard';

        $user->delete();
        alert()->toast('User Deleted Successfully', 'error');
        return redirect()->route('users.index', compact('title'))->with('success', 'User deleted successfully');
    }

}
