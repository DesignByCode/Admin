<?php

namespace DesignByCode\Admin\Providers;


use DesignByCode\Admin\Models\Category;
use DesignByCode\Admin\Models\Gallery;
use DesignByCode\Admin\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        //Load migrations
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        //Load web routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');

        //Load Views
        $this->loadViewsFrom(__DIR__ . '/../views', 'admin');

        $this->publishes([
            __DIR__ . '/../config/admin.php' => config_path('admin.php')
        ], 'Admin Config');

        $this->publishes([
            __DIR__.'/../../database/migrations' => database_path('migrations'),
        ], 'Admin Migration');

        $this->publishes([
            __DIR__.'/../../database/seeds' => database_path('seeds')
        ], 'Admin Seeds');


        $this->publishes([
            __DIR__.'/../../env/env.admin.example' => app_path('env.admin.example')
        ], 'Admin Env');

        $this->publishes([
            __DIR__.'/../../assetsPublic/public/css/admin.css' => app_path('public/css/admin.css'),
            __DIR__.'/../../assetsPublic/public/js/admin.js' => app_path('public/js/admin.js'),
            __DIR__.'/../../assetsPublic/public/fonts' => app_path('public/fonts'),
        ], 'Admin Assets');



        Category::creating(function($query) {
           $query->name = Str::title($query->name);
           $query->slug = Str::slug($query->name);
        });

        Category::updating(function($query) {
           $query->name = Str::title($query->name);
           $query->slug = Str::slug($query->name);
        });

        Product::creating(function($query) {
           $query->name = Str::title($query->name);
           $query->slug = Str::slug($query->name);
        });

        Product::updating(function($query) {
           $query->name = Str::title($query->name);
           $query->slug = Str::slug($query->name);
        });

        Gallery::creating(function($query) {
           $query->name = Str::title($query->name);
           $query->slug = Str::slug($query->name);
        });

        Gallery::updating(function($query) {
           $query->name = Str::title($query->name);
           $query->slug = Str::slug($query->name);
        });

        Route::bind('products', function ($value) {
            return Product::where('slug', $value)->orWhere(function ($query) use ($value) {
                if (is_numeric($value)) {
                    $query->where('id', $value);
                }
            })->firstOrFail();
        });

        Route::bind('categories', function ($value) {
            return Category::where('slug', $value)->orWhere(function ($query) use ($value) {
                if (is_numeric($value)) {
                    $query->where('id', $value);
                }
            })->firstOrFail();
        });

        Route::bind('galleries', function ($value) {
            return Gallery::where('slug', $value)->orWhere(function ($query) use ($value) {
                if (is_numeric($value)) {
                    $query->where('id', $value);
                }
            })->firstOrFail();
        });

    }
}
