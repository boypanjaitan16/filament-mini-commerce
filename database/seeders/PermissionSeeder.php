<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'revoke-comment',
            'display_name' => 'Revoke Comment', // optional
            'description' => 'Revoke a comment on a product discussion'
        ]);

        Permission::create([
            'name' => 'attach-image',
            'display_name' => 'Attach Image', // optional
            'description' => 'Attach an image on product discussion', // optional
        ]);
    }
}
