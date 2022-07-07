<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Database\Seeders\UsersTableSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserTableSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            // PermissionRoleTableSeeder::class,
            
            RoleUserTableSeeder::class,
        ]);



    }
}
