<?php

namespace Moman12\DashboardUi;

use Illuminate\Support\ServiceProvider;
use Moman12\DashboardUi\Commands\DashboardUiCommand;
use Moman12\DashboardUi\Commands\ControllersCommand;
use Moman12\DashboardUi\Commands\AuthCommand;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
class DashboardUiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::mixin(new AuthRouteMethods);
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../public/asset' => public_path('admin-layout'),
            ], 'assets');
        }

        if (File::exists(app_path('helpers.php'))) {
            require_once app_path('helpers.php');
        }
            $this->publishes([
                __DIR__ . '/../config/dashboard_ui.php' => config_path('dashboard_ui.php'),
            ], 'config');
////
////            $this->publishes([
////                __DIR__ . '/../resources/views' => base_path('resources/views/vendor/dashboard_ui'),
////            ], 'views');
////
////            $migrationFileName = 'create_dashboard_ui_table.php';
////            if (! $this->migrationFileExists($migrationFileName)) {
////                $this->publishes([
////                    __DIR__ . "/../database/migrations/{$migrationFileName}.stub" => database_path('migrations/' . date('Y_m_d_His', time()) . '_' . $migrationFileName),
////                ], 'migrations');
////            }
//
//            $this->commands([
//                DashboardUiCommand::class,
//            ]);
//        }
//
//        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard_ui');
    }

    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                AuthCommand::class,
                ControllersCommand::class,
                DashboardUiCommand::class,
            ]);
        }

//        $this->mergeConfigFrom(__DIR__ . '/../config/dashboard_ui.php', 'dashboard_ui');
    }

    public static function migrationFileExists(string $migrationFileName): bool
    {
        $len = strlen($migrationFileName);
        foreach (glob(database_path("migrations/*.php")) as $filename) {
            if ((substr($filename, -$len) === $migrationFileName)) {
                return true;
            }
        }

        return false;
    }
}
