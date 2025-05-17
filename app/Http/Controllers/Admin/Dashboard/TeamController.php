<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $user = Auth::user();
        $setting = Setting::first();
        $title = $user->name . ' | Dashboard';
        return view('admin.dashboard.team.index', compact('teams', 'title', 'setting'));
    }

    public function create()
    {

        $user = Auth::user();
        $setting = Setting::first();
        $title = $user->name . ' | Dashboard';
        return view('admin.dashboard.team.create', compact('title', 'setting'));
    }

    public function store(Request $request)
    {
        dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:4048',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'webaddress' => 'nullable|string',
            'designation' => 'nullable|string|max:255',
            'twitter' => 'nullable|string',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'whatsapp' => 'nullable|string|max:20',
            'intro' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'experience_communication' => 'nullable|numeric|min:0|max:100',
            'experience_professionalism' => 'nullable|numeric|min:0|max:100',
            'experience_quality' => 'nullable|numeric|min:0|max:100',
            'experience_value' => 'nullable|numeric|min:0|max:100',
        ]);
        $data = $request->all();
        // dd($data);
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('team_photos', 'public');
        }

        Team::create($data);
        alert()->toast('Team Details Added Successfully', 'success');
        return redirect()->route('teams.index')->with('success', 'Team member created successfully.');
    }

    public function edit(Team $team)
    {

        $user = Auth::user();
        $setting = Setting::first();
        $title = $user->name . ' | Dashboard';
        return view('admin.dashboard.team.edit', compact('team', 'title', 'setting'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:8048',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'webaddress' => 'nullable|string',
            'designation' => 'nullable|string|max:255',
            'twitter' => 'nullable|string',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'whatsapp' => 'nullable|string|max:20',
            'intro' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'experience_communication' => 'nullable|numeric|min:0|max:100',
            'experience_professionalism' => 'nullable|numeric|min:0|max:100',
            'experience_quality' => 'nullable|numeric|min:0|max:100',
            'experience_value' => 'nullable|numeric|min:0|max:100',
        ]);

        $data = $request->except('photo'); // Collect all except file initially

        if ($request->hasFile('photo')) {
            if ($team->photo) {
                Storage::delete('public/' . $team->photo);
            }
            $data['photo'] = $request->file('photo')->store('team_photos', 'public');
        }

        $team->update($data);
        alert()->toast('Team Details Updated Successfully', 'success');
        return redirect()->route('teams.index')->with('success', 'Team member updated successfully.');
    }


    public function destroy(Team $team)
    {
        if ($team->photo) {
            Storage::delete('public/' . $team->photo);
        }
        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Team member deleted successfully.');
    }
}
