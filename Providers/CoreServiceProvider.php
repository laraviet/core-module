<?php

namespace Modules\Core\Providers;

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Http\Middleware\VerLiMiddleware;
use Modules\Core\Repositories\Cache\LabelCacheRepository;
use Modules\Core\Repositories\Cache\PermissionCacheRepository;
use Modules\Core\Repositories\Cache\UserCacheRepository;
use Modules\Core\Repositories\Contracts\LabelRepositoryInterface;
use Modules\Core\Repositories\Contracts\PermissionRepositoryInterface;
use Modules\Core\Repositories\Contracts\RoleRepositoryInterface;
use Modules\Core\Repositories\Contracts\UserRepositoryInterface;
use Modules\Core\Repositories\RoleRepository;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use Spatie\Permission\Middlewares\RoleMiddleware;
use Spatie\Permission\Middlewares\RoleOrPermissionMiddleware;

class CoreServiceProvider extends ServiceProvider
{
    public $bindings = [
        UserRepositoryInterface::class       => UserCacheRepository::class,
        LabelRepositoryInterface::class      => LabelCacheRepository::class,
        RoleRepositoryInterface::class       => RoleRepository::class,
        PermissionRepositoryInterface::class => PermissionCacheRepository::class,
    ];
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Core';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'core';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        if ( ! config('core.saas_enable')) {
            $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
        }
        $this->loadMiddleware();

        if (config('core.saas_enable')) {
            $this->app->bind(\Modules\Core\Entities\User::class, \Modules\Core\Entities\Tenants\User::class);
            $this->app->bind(\Modules\Core\Entities\Label::class, \Modules\Core\Entities\Tenants\Label::class);
            $this->app->bind(\Modules\Core\Entities\LabelTranslation::class, \Modules\Core\Entities\Tenants\LabelTranslation::class);
            $this->app->bind(\Modules\Core\Entities\Role::class, \Modules\Core\Entities\Tenants\Role::class);
            $this->app->bind(\Modules\Core\Entities\Permission::class, \Modules\Core\Entities\Tenants\Permission::class);
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        //Load helper file
        require_once(__DIR__ . '/../Helpers/functions.php');
        require_once(__DIR__ . '/../Tests/Utilities/functions.php');
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if ( ! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path($this->moduleName, 'Database/factories'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }

        return $paths;
    }

    /**
     * Load Middleware
     */
    private function loadMiddleware()
    {
        $this->app['router']->pushMiddlewareToGroup('web', VerLiMiddleware::class);
        $this->app['router']->aliasMiddleware('role', RoleMiddleware::class);
        $this->app['router']->aliasMiddleware('permission', PermissionMiddleware::class);
        $this->app['router']->aliasMiddleware('role_or_permission', RoleOrPermissionMiddleware::class);
    }
}
