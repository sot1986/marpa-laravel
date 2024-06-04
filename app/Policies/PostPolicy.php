<?php

namespace App\Policies;

use App\Contracts\TestInterface;
use App\Models\Post;
use App\Models\User;

class PostPolicy implements TestInterface
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    public function test(): void
    {
        echo 'Test da PostPolicy';
    }
}
