<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Board;
use App\Policies\BoardPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

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
        Model::unguard();
        // Gate::define('update-board', function (User $user, Board $board) {
        //     return $user->id === $board->user_id;
        // });
        Gate::policy(Board::class, BoardPolicy::class);
    }
}
