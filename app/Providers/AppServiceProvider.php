<?php

namespace App\Providers;
use App\BlogCategory;
use App\Tag;
use File;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);

        // view()->composer('layouts.partials.sidebar', function($view)
        // {
        //     $tags = Tag::all();
        //     $view->with(['tags' => $tags]);
        // });
        // $menus = [];
        // if (File::exists(base_path('resources/laravel-admin/menus.json'))) {
        //     $menus = json_decode(File::get(base_path('resources/laravel-admin/menus.json')));
        //     view()->share('laravelAdminMenus', $menus);
        // }

    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
