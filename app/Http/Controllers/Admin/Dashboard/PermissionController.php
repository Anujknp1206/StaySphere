<?php
namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        // Apply middleware to restrict access (for example 'permission:manage permissions')
        $this->middleware('permission:manage permissions');
    }

    /**
     * Display a listing of the permissions.
     */
    public function index()
    {
        $user = Auth::user();
        $title = $user->name . ' | Dashboard';
        $setting = Setting::first();

        $heading = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($heading, $text);
        // dd(confirmDelete());
        $permissions = Permission::all(); // Get all permissions
        return view('admin.dashboard.permissions.index', compact('permissions', 'title', 'setting'));
    }

    /**
     * Show the form for creating a new permission.
     */
    public function create()
    {
        $user = Auth::user();
        $setting = Setting::first();
        $title = $user->name . ' | Dashboard';
        return view('admin.dashboard.permissions.create', compact('title', 'setting')); // Show form for creating a permission
    }

    /**
     * Store a newly created permission.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name'
        ]);

        $permission = Permission::create(['name' => $request->name]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'name' => $permission->name,
            ]);
        }
        alert()->toast('Permission Added Successfully', 'success');

        return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
    }

    /**
     * Show the form for editing a permission.
     */
    public function edit($id)
    {
        $user = Auth::user();
        $setting = Setting::first();
        $title = $user->name . ' | Dashboard';
        $permission = Permission::findOrFail($id);
        return view('admin.dashboard.permissions.edit', compact('title', 'permission', 'setting')); // Show edit form
    }

    /**
     * Update the specified permission.
     */
    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id
        ]);
        $permission->name = $request->name;
        $permission->save();
        toast("Permission Updated Successfully", 'success');

        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified permission.
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        alert()->toast('Permission Deleted Successfully', 'error');
        return redirect()->route('permissions.index');
    }

    /**
     * Show permissions form for a specific user.
     */
    public function showPermissions($userId)
    {
        $user = User::findOrFail($userId);
        $permissions = Permission::all(); // Get all permissions
        $userPermissions = $user->permissions->pluck('id')->toArray();  // Get the permissions assigned to this user

        $title = 'Manage Permissions for ' . $user->name;

        return view('admin.dashboard.permissions.user_permissions', compact('user', 'permissions', 'userPermissions', 'title'));
    }

    /**
     * Update the permissions for a specific user.
     */
    public function updatePermissions(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        // Validate the permissions input
        $request->validate([
            'permissions' => 'array|nullable',
            'permissions.*' => 'exists:permissions,id',  // Make sure the permissions are valid
        ]);

        // Sync the user's permissions
        $user->permissions()->sync($request->permissions);

        alert()->toast('Permissions Updated Successfully', 'success');
        return redirect()->route('haspermissions', $user->id)->with('success', 'Permissions updated successfully.');
    }
}
