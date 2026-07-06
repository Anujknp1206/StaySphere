<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    // Show lock form
    public function lockScreen()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();
        $setting = Setting::first();
        $title = $user->name . ' | Lock';
        return view('Admin.Auth.LockScreen', compact('user', 'title', 'setting'));
    }

    public function unlock(Request $request)
    {

        $user = Auth::user();
        if (Hash::check($request->password, $user->password)) {
            // Unlock successful, redirect to dashboard
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['password' => 'Incorrect password']);
    }
    // Show login form

    public function login()
    {
        $setting = Setting::first();
        return view('Admin.Auth.Login', compact('setting'));
    }

    // Show register form
    public function register()
    {
        $setting = Setting::first();
        return view('Admin.Auth.Register', compact('setting'));
    }

    // Handle login
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');



        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            Alert::error('Login Failed', 'Invalid Email or Password');
            return redirect()->route('login');
        }
    }

    // Handle registration
    public function registerUser(Request $request)
    {
        // First validate without unique check
        $credentials = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'phone'=>'min:10',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4048',
        ]);

        // Manually check if user already exists
        if (User::where('email', $request->email)->exists()) {
            Alert::error('Registration Failed', 'User already registered');
            return redirect()->route('login');
        }

        // Handle image
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $timestamp = time();
            $extension = $file->getClientOriginalExtension();
            $filename = $timestamp . '.' . $extension;
            $photoPath = $file->storeAs('/photos', $filename, 'public');
            $credentials['photo'] = $filename;
        }

        // Create user
        $user = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password']),
            'phone'=>$credentials['phone'],
            'photo' => $credentials['photo'] ?? null,
        ]);
        $user->assignRole('customer');
        if ($user) {
            Alert::success('Registered Successfully', 'Welcome to the family');
            return redirect()->route('login');
        } else {
            Alert::error('Registration Failed', 'Something went wrong');
            return redirect()->back()->withInput();
        }
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        toast('Logged Out', 'error');
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    }
}
