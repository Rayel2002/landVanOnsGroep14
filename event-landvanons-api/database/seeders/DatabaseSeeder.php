<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Event;
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
//         User::factory(10)->create();

         User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);

         User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@admin.nl',
             'password' => 'JNwd]W:8#~3dUAN',
         ]);

         Event::factory()->count(10)->create();
    }
}
