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
        // Role::factory()->count(10)->create();
        Role::query()->upsert(
            [
                ['name' => 'admin', 'description' => 'Administrator'],
                ['name' => 'user', 'description' => 'Regular User'],
                ['name' => 'moderator', 'description' => 'Moderator'],
                ['name' => 'author', 'description' => 'Author']
            ],
            ['name'],
            ['description']
        );
    }
}
