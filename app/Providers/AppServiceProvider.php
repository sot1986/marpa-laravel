<?php

namespace App\Providers;

use App\Contracts\TestInterface;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Route::model('post', Post::class);
    }
}
