<?php

namespace DesignByCode\Admin\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use DesignByCode\Admin\Models\Gallery;
use DesignByCode\Admin\Models\Product;
use DesignByCode\Admin\Models\Category;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if($this->app['config']->get('admin') === null) {
           $this->app['config']->set('admin', require __DIR__ . '/../config/admin.php');
        }
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
        //
        if (! $this->app->routesAreCached()) {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
            $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        }
        //Load Views
        $this->loadViewsFrom(__DIR__ . '/../views', 'admin');

        $this->publishes([
            __DIR__ . '/../config/admin.php' => config_path('admin.php')
        ], 'DesignByCode Admin Config');

        $this->publishes([
            __DIR__.'/../../database/migrations' => database_path('migrations'),
        ], 'DesignByCode Admin Migration');

        $this->publishes([
            __DIR__.'/../../database/seeds' => database_path('seeds')
        ], 'DesignByCode Admin Seeds');


        $this->publishes([
            __DIR__.'/../../env/.env.admin.example' => base_path('.env.admin.example')
        ], 'DesignByCode Admin Env');

        $this->publishes([
            __DIR__.'/../../assetsPublic/public/css/admin.css' => public_path('css/admin.css'),
            __DIR__.'/../../assetsPublic/public/js/admin.js' => public_path('js/admin.js'),
            __DIR__.'/../../assetsPublic/public/fonts' => public_path('fonts'),
        ], 'DesignByCode Admin Assets');


        Category::creating(function($query) {
           $query->name = Str::title($query->name);
        });

        Category::updating(function($query) {
           $query->name = Str::title($query->name);
        });

        Product::creating(function($query) {
           $query->name = Str::title($query->name);
        });

        Product::updating(function($query) {
           $query->name = Str::title($query->name);
        });

        Gallery::creating(function($query) {
           $query->name = Str::title($query->name);
        });

        Gallery::updating(function($query) {
           $query->name = Str::title($query->name);
        });

        // Route::bind('products', function ($value) {
    
        //     return Product::where('slug', $value)->orWhere(function ($query) use ($value) {
        //         if (is_numeric($value)) {
        //             $query->where('id', $value);
        //         }
        //     })->firstOrFail();
        // });

        // Route::bind('categories', function ($value) {
        //     return Category::where('slug', $value)->orWhere(function ($query) use ($value) {
        //         if (is_numeric($value)) {
        //             $query->where('id', $value);
        //         }
        //     })->firstOrFail();
        // });

        // Route::bind('galleries', function ($value) {
        //     return Gallery::where('slug', $value)->orWhere(function ($query) use ($value) {
        //         if (is_numeric($value)) {
        //             $query->where('id', $value);
        //         }
        //     })->firstOrFail();
        // });

    }
}
