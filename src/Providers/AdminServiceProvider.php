<?php

namespace DesignByCode\Admin\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use DesignByCode\Admin\Models\UserSocial;
use DesignByCode\Admin\Models\{Gallery, Product, Category};
use DesignByCode\Admin\Observers\{GalleryObserver, ProductObserver, CategoryObserver, UserSocialObservers};
use DesignByCode\Admin\Providers\AdminMiddlewareServiceProvider;

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

        if($this->app['config']->get('social') === null) {
           $this->app['config']->set('social', require __DIR__ . '/../config/social.php');
        }

        $this->app->register(AdminMiddlewareServiceProvider::class);

        $this->app->register(AdminSocialServiceProvider::class);
        
        $this->mergeConfigFrom(
            __DIR__ . '/../config/services.php', 'services'
        );
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

        UserSocial::observe(UserSocialObservers::class);

        Category::observe(CategoryObserver::class);

        Product::observe(ProductObserver::class);

        Gallery::observe(GalleryObserver::class);

    }
}
