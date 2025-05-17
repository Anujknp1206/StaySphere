<?php

namespace App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Controller;

use App\Models\Facility;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class FacilityController extends Controller
{
    // Display all facilities
    public function index()
    {
        $user = Auth::user();
        $title = $user->name . ' | Dashboard';
        $setting = Setting::first();
        $facilities = Facility::all();
        return view('admin.dashboard.facilities.index', compact('facilities', 'title', 'setting'));
    }

    // Show the form to create a new facility
    public function create()
    {
        $user = Auth::user();
        $title = $user->name . ' | Dashboard';
        $setting = Setting::first();

        return view('admin.dashboard.facilities.create', compact('setting', 'title'));
    }

    // Store a newly created facility
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'type' => 'required|in:standard,premium', // Icon name validation (FontAwesome class)
        ]);

        Facility::create($request->all());
        alert()->toast('Facility Added Successfully', 'success');
        return redirect()->route('facilities.index')->with('success', 'Facility created successfully!');
    }

    // Show the form to edit an existing facility
    public function edit(Facility $facility)
    {
        $user = Auth::user();
        $title = $user->name . ' | Dashboard';
        $setting = Setting::first();

        return view('admin.dashboard.facilities.edit', compact('facility', 'title', 'setting'));
    }

    // Update the specified facility
    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255', // Icon name validation (FontAwesome class)
        ]);

        $facility->update([
            'name' => $request->name,
            'icon' => $request->icon,
        ]);
        alert()->toast('Facility Updated Successfully', 'success');
        return redirect()->route('facilities.index')->with('success', 'Facility updated successfully!');
    }

    // Delete the specified facility
    public function destroy(Facility $facility)
    {
        $facility->delete();
        alert()->toast('Facility Deleted ', 'error');
        return redirect()->route('facilities.index')->with('success', 'Facility deleted successfully!');
    }
}