<?php

namespace Laravelir\Redirector\Providers;

use App\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Laravelir\Redirect\Http\Middleware\RedirectorMiddleware;
use Laravelir\Redirector\Facades\RedirectorFacade;
use Laravelir\Redirector\Console\Commands\InstallPackageCommand;
use Laravelir\Redirector\Services\Redirector;

class RedirectorServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../../config/redirector.php", 'redirector');

        $this->registerFacades();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerCommands();
        $this->publishMigrations();
        $this->publishConfig();
        $this->registerMiddleware();
    }

    private function registerFacades()
    {
        $this->app->bind('redirector', function ($app) {
            return new Redirector();
        });
    }

    private function registerCommands()
    {
        if ($this->app->runningInConsole()) {

            $this->commands([
                InstallPackageCommand::class,
            ]);
        }
    }

    public function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../../config/redirector.php' => config_path('redirector.php')
        ], 'redirector-config');
    }

    protected function publishMigrations()
    {
        $timestamp = date('Y_m_d_His', time());
        $this->publishes([
            __DIR__ . '/../../database/migrations/create_redirector_table.stub' => database_path() . "/migrations/{$timestamp}_create_redirector_table.php",
        ], 'redirector-migration');
    }

    protected function registerMiddleware()
    {
        $router = resolve(Router::class);

        $router->aliasMiddleware('redirector', RedirectorMiddleware::class);
    }

}
