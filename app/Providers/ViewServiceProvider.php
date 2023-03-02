<?php

namespace App\Providers;

use App\Http\ViewComposers\UserAssociationsComposer;
use Illuminate\Support\ServiceProvider;
use App\Models\Association;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //Questo Service Provider provvede a legare a tutte le view i dati forniti dal view composer "UserAssociationsComposer"
        View::composer('*', UserAssociationsComposer::class);

    }
}
