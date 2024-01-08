<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Permission for admin
        Permission::firstOrCreate(['name' => 'create-event']);
        Permission::firstOrCreate(['name' => 'edit-event']);
        Permission::firstOrCreate(['name' => 'delete-event']);

        //Permission for visitor
        Permission::firstOrCreate(['name' => 'create-account']);
        Permission::firstOrCreate(['name' => 'view-registered-events']);
        Permission::firstOrCreate(['name' => 'share-events']);
        Permission::firstOrCreate(['name' => 'post-review']);

        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $visitorRole = Role::firstOrCreate(['name' => 'Visitor']);
        $farmerRole = Role::firstOrCreate(['name' => 'Farmer']);

        $adminRole->givePermissionTo([
            'create-event',
            'edit-event',
            'delete-event'
        ]);

        $visitorRole->givePermissionTo([
            'create-account',
            'view-registered-events',
            'share-events',
            'post-review'
        ]);

        $farmerRole->givePermissionTo([
            'create-account',
            'view-registered-events',
            'share-events',
            'post-review',
            'create-event',
            'edit-event',
            'delete-event'
        ]);
    }
}
