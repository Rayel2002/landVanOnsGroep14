<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RoleAndPermissionSeeder::class
        ]);
         User::factory(10)->create();

         User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);

        $adminUser = User::factory()->create([
            'name' => 'Admin User',
            'role' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Change 'password' to the desired password
        ]);

        // Assign the 'Admin' role to the admin user
        $adminUser->assignRole('Admin');
    }
}
