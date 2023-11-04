<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
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

        $adminRole = Role::create(['name' => 'Admin']);
        $visitorRole = Role::create(['name' => 'Visitor']);

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
    }
}
