<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $memberRole = Role::firstOrCreate(['name' => 'member']);
        Role::firstOrCreate(['name' => 'staff']);
        Role::firstOrCreate(['name' => 'subscriber']);
        Role::firstOrCreate(['name' => 'guest']);

        // Create permissions
        $permissions = [
            'view users', 'create users', 'edit users', 'delete users',
            'view products', 'create products', 'edit products', 'delete products',
            'view orders', 'create orders', 'edit orders', 'delete orders',
            'view pages', 'create pages', 'edit pages', 'delete pages',
            'view courses', 'enroll courses',
            'view certifications',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign all permissions to admin
        $adminRole->givePermissionTo(Permission::all());

        // Assign member permissions
        $memberRole->givePermissionTo([
            'view products',
            'view orders', 'create orders',
            'view courses', 'enroll courses',
            'view certifications',
        ]);
    }
}
