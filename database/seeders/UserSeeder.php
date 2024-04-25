<?php

namespace Database\Seeders;

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
        $admin = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@yopmail.com',
        ]);
        $admin->addRole('admin');

        for ($i = 0; $i <= 10; $i++) {
            $user = User::factory()->create();
            $user->addRole('consument');
        }
    }
}
