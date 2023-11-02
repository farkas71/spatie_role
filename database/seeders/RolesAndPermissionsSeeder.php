<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // USER MODEL
        $userPermission1 = Permission::create(['name' => 'create users']);
        $userPermission2 = Permission::create(['name' => 'read users']);
        $userPermission3 = Permission::create(['name' => 'update users']);
        $userPermission4 = Permission::create(['name' => 'delete users']);

        // ROLE MODEL
        $rolePermission1 = Permission::create(['name' => 'create roles']);
        $rolePermission2 = Permission::create(['name' => 'read roles']);
        $rolePermission3 = Permission::create(['name' => 'update roles']);
        $rolePermission4 = Permission::create(['name' => 'delete roles']);

        // PERMISSION MODEL
        $permission1 = Permission::create(['name' => 'create permissions']);
        $permission2 = Permission::create(['name' => 'read permissions']);
        $permission3 = Permission::create(['name' => 'update permissions']);
        $permission4 = Permission::create(['name' => 'delete permissions']);


        $adminRole = Role::create(['name' => 'admin'])
                     ->syncPermissions([
                        $userPermission2,
                        $rolePermission2,
                        $permission2,
                     ]);

        $superAdminRole = Role::create(['name' => 'super_admin'])
                          ->syncPermissions(Permission::all());

        // CREATE ADMINS & SUPERADMIN
        User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@superadmin.hu',
            'email_verified_at' => now(),
            'password' => Hash::make('11111111'),
            'remember_token' => Str::random(10),
        ])->assignRole($superAdminRole);

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.hu',
            'email_verified_at' => now(),
            'password' => Hash::make('22222222'),
            'remember_token' => Str::random(10),
        ])->assignRole($adminRole);
    }
}
