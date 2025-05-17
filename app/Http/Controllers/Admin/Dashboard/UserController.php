<?php
namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage users');
    }

    /**
     * Display a listing of the users.
     */
    public function haspermissions()
    {
        $users = User::with(['roles', 'permissions'])->get(); // eager load roles and permissions
        $title = 'User Management | Dashboard';
        $setting = Setting::first();
        return view('admin.dashboard.users.allpermissions', compact('users', 'title', 'setting'));
    }

    /**
     * Show the permissions form for a user.
     */
    public function showPermissions($userId)
    {
        $user = User::findOrFail($userId);
        $permissions = Permission::all(); // Get all permissions
        $userPermissions = $user->permissions->pluck('id')->toArray(); // Get the permissions assigned to this user
        $setting = Setting::first();
        $title = 'Manage Permissions for ' . $user->name;

        return view('admin.dashboard.users.haspermissions', compact('user', 'permissions', 'setting','userPermissions', 'title'));
    }

    /**
     * Update the permissions for a user.
     */
    public function updatePermissions(Request $request, $userId)
    {
        try {
            $user = Auth::user();
            $title = $user->name . ' | Dashboard';
            $user = User::findOrFail($userId);
            $permissionIds = $request->input('permissions', []); // Get selected permissions

            // Validate the input
            $request->validate([
                'permissions' => 'array|nullable',
                'permissions.*' => 'exists:permissions,id',
            ]);

            // Convert permission IDs to names
            $permissions = Permission::whereIn('id', $permissionIds)->pluck('name')->toArray();

            // Sync permissions with the user
            $user->syncPermissions($permissionIds);
            alert()->toast('Permissions Updated Successfully', 'success');

            return redirect()->route('users.index', compact('title'));
        } catch (\Exception $e) {
            alert()->toast('Permissions Update Fails', 'error');
            return redirect()->route('users.index', compact('title'));
        }
    }
}

