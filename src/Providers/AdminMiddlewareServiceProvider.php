<?php

namespace DesignByCode\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class AdminMiddlewareServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['router']->aliasMiddleware('social', \DesignByCode\Admin\Http\Middleware\Social::class);
        // $this->app['router']->middleware(\DesignByCode\Admin\Http\Middleware\ShortCodeMiddleware::class); 
        $this->app['router']->aliasMiddleware('role', \Spatie\Permission\Middlewares\RoleMiddleware::class);
        $this->app['router']->aliasMiddleware('permission', \Spatie\Permission\Middlewares\PermissionMiddleware::class);
        $this->app['router']->aliasMiddleware('role_or_permission', \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
