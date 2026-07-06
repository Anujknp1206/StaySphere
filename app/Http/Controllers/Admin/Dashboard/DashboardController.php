<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckUserRole;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Middleware\RoleMiddleware;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    /**
     * Constructor applies middleware to protect dashboard access
     */
    public function __construct()
    {
        $this->middleware('auth'); // Make sure the user is authenticated
        $this->middleware('web'); // Make sure the user is authenticated
        $this->middleware('checkuserrole'); // Make sure the user is authenticated
        // You can also add role/permission middleware if needed
    }

    /**
     * Show the admin dashboard
     */
    public function dashboard()
{
    if (Auth::check()) {
        // User is authenticated
        $user = Auth::user();
        $setting=Setting::first();
        $title= $user->name.' | Dashboard'; 
        return view('admin.Dashboard.dashboard', compact('user','setting','title'));
    } else {
        // User is not authenticated
        return redirect()->route('login');
    }
}
}
