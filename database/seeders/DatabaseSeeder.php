<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $admin = User::create([
            'name' => 'Admin User',
            'username' => '1A102401',
            'email' => 'admin@admin.com',
            'password' => "password",
            'role' => "admin",
        ]);

        $admin_role = Role::create(['name' => "admin"]);

        $admin->assignRole($admin_role);
    }
}
