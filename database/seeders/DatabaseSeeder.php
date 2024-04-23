<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function __construct(private PostSeeder $seeder)
    {
        // $this->withoutEvents();
    }

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->count(10)->create()->each(
            function (User $user) {
                Post::factory()->count(5)->create([
                    'user_id' => $user->id,
                ]);
            }
        );

        $this->seeder->run();
    }
}
