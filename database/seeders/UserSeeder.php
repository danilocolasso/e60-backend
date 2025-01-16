<?php

namespace Database\Seeders;

use App\Enums\UserRoles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Root',
            'username' => 'root',
            'email' => 'root@user.com',
            'password' => bcrypt('password'),
            'role' => UserRoles::MASTER,
        ]);

        User::factory()->count(85)->create();
    }
}
