<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Custom\ModelNotFound\CustomModelNotFound;
use App\Custom\ModelNotFound\ModelNotFoundSettings;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Custom\CustomModelNotFoundResponse\Settings\CustomModelNotFoundSettings;

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
        CustomModelNotFoundSettings::setMessage('Default message in AppProvider');
    }
}
