<?php

namespace App\Providers;

use App\Models\DDCcategory;
use App\Observers\DDCcategoryObserver;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
        // DDCcategory::observe(DDCcategoryObserver::class);
        // if (App::environment(["prod", "production"])) {
        //     URL::forceScheme("https");
        // }

    }
}
