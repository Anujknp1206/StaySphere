<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    // Constructor to apply middleware
    public function __construct()
    {
        $this->middleware('permission:manage settings');
    }

    // Display a listing of the settings (index page)
    public function index()
    {
        $user = Auth::user();
        $title = $user->name . ' | Dashboard';

        $settings = Setting::all();  // Fetch all settings (you can adjust this if you have only one record)
        return view('admin.dashboard.settings.index', compact('settings','title'));
    }


    // Show the form for editing the specified settings
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        $user = Auth::user();
        $title = $user->name . ' | Dashboard';
        return view('admin.dashboard.settings.edit', compact('setting','title'));
    }

    // Update the specified settings in storage
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'office1' => 'nullable|string|max:255',
            'office2' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone_no' => 'nullable|string|max:20',
            'website' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'map_location' => 'nullable|url',
        ]);
    
        $setting = Setting::findOrFail($id);
        $data = $request->only([
            'name', 'office1', 'office2', 'address', 'phone_no', 
            'website', 'facebook', 'instagram', 'linkedin', 'whatsapp', 'map_location'
        ]);
    
        // Handle file uploads and removals
        if ($request->hasFile('logo')) {
            if (!empty($setting->logo)) {
                Storage::delete('public/' . $setting->logo);
            }
            $logoPath = $request->file('logo')->store('logos', 'public');
            $data['logo'] = $logoPath;
        }
    
        // Update the settings record
        $setting->update($data);
    
        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }

}
