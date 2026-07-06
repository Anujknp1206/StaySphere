<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function show()
    {

        $user = Auth::user();
        $title = $user->name . ' Profile';

        return view('admin.Dashboard.profile.show', compact('user', 'title'));
    }

    public function edit()
    {
        $user = Auth::user();
        $title = $user->name . ' Profile';
        return view('admin.Dashboard.profile.edit', compact('user', 'title'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|in:male,female,other',
            'dob' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:4048',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->dob = $request->dob;

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::delete('public/'.$user->photo);
            }
            $user->photo = $request->file('photo')->store('user_photos','public');
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        Alert::success("Success", "Profile Updated Successfully");

        return redirect()->route('profile.show');
    }

    public function changePassword()
    {
        $user = Auth::user();
        $title = $user->name . ' Profile';
        return view('admin.Dashboard.profile.changePassword', compact('title'));
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => 'Your current password is incorrect.',
            ]);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profile.edit')->with('success', 'Password updated successfully!');
    }
}
