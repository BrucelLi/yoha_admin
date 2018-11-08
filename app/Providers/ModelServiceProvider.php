<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/10/30
 * Time: 15:43
 */
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModelServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\User\Contracts\AdminUserRepository::class,
            \App\Repositories\User\AdminUserRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Common\Contracts\ConfigRepository::class,
            \App\Repositories\Common\ConfigRepository::class
        );

        $this->app->singleton(
            \App\Repositories\User\Contracts\AdminUserLogRepository::class,
            \App\Repositories\User\AdminUserLogRepository::class
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            \App\Repositories\User\Contracts\AdminUserRepository::class,
            \App\Repositories\Common\Contracts\ConfigRepository::class,
            \App\Repositories\User\Contracts\AdminUserLogRepository::class,
        ];
    }
}