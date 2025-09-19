<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'access dashboard',
            'manage permissions',
            'manage roles',
            'manage branches',
            'manage areas',
            'manage tables',
            'manage reservations',
            'manage orders',
            'manage menu',
            'manage users',
            'view reports',
            'manage roles and permissions',
            'view own profile',
            'edit own profile',
            'view assigned tables',
            'update order status'
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
