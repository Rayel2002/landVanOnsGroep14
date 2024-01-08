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
        Permission::create(['name' => 'create-event']);
        Permission::create(['name' => 'edit-event']);
        Permission::create(['name' => 'delete-event']);

        //Permission for visitor
        Permission::create(['name' => 'create-account']);
        Permission::create(['name' => 'view-registered-events']);
        Permission::create(['name' => 'share-events']);
        Permission::create(['name' => 'post-review']);

        //Permission for farmer
        Permission::create(['name' => 'create-account']);
        Permission::create(['name' => 'view-registered-events']);
        Permission::create(['name' => 'share-events']);
        Permission::create(['name' => 'post-review']);
        Permission::create(['name' => 'create-event']);
        Permission::create(['name' => 'edit-event']);
        Permission::create(['name' => 'delete-event']);

        $adminRole = Role::create(['name' => 'Admin']);
        $visitorRole = Role::create(['name' => 'Visitor']);
        $farmerRole = Role::create(['name' => 'Farmer']);

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
