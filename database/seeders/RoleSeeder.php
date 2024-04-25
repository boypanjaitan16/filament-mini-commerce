<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
            'display_name' => 'Administrator', // optional
        ]);

        Role::create([
            'name' => 'consument',
            'display_name' => 'Consument', // optional
        ]);

        Role::create([
            'name' => 'marketing',
            'display_name' => 'Marketing', // optional
        ]);
    }
}
