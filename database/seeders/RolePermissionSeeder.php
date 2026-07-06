<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $perms = [
            'manage users',
            'manage permissions',
            'manage rooms',
            'manage bookings',
            'manage settings',
            'manage dashboard',
            'manage teams',
            'manage reviews',
            'manage profile',
            'manage payments',
            'manage contacts',
            'manage faqs',
            'watch_order status'

        ];
        foreach ($perms as $p) {
            Permission::firstOrCreate(['name' => $p]);
        }

        $super = Role::firstOrCreate(['name' => 'super admin']);
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $client = Role::firstOrCreate(['name' => 'customer']);

        $super->syncPermissions(Permission::all());
        $admin->syncPermissions([
            'manage rooms',
            'manage bookings',
            'manage settings',
            'manage teams',
            'manage reviews',
            'manage contacts',
            'manage dashboard',
            'manage profile',
            'manage payments',

        ]);
        $client->syncPermissions(['watch_order status', 'manage dashboard', 'manage profile',]);
    }
}