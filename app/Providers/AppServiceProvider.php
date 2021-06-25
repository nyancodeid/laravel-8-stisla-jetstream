<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Traits\WithDataSidebar;

class AppServiceProvider extends ServiceProvider
{
    use WithDataSidebar;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('components.sidebar', function ($view) {
            $navigation_links = $this->sidebar_data();
            $view->with(compact('navigation_links'));
        });
    }
}
