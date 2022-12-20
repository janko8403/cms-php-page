<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Repositories\Repositories\AdminRepository;
use Illuminate\Support\Facades\View;
use App\Models\{Language, Page};
use Config;
use Session;
use App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AdminRepositoryInterface::class, AdminRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }

        View::share(['languages' => Language::all(), 'pages' => Page::all()]);
    }
}
