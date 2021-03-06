<?php

namespace Moman12\DashboardUi\Commands;

use Illuminate\Console\Command;
use InvalidArgumentException;

class AuthCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ui:auth
                    { type=bootstrap : The preset type (bootstrap) }
                    {--views : Only scaffold the authentication views}
                    {--force : Overwrite existing views by default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffold basic login and registration views and routes';

    /**
     * The views that need to be exported.
     *
     * @var array
     */
    protected $views = [
        'auth/login.blade.php' => 'auth/login.blade.php',
        'auth/passwords/confirm.blade.php' => 'auth/passwords/confirm.blade.php',
        'auth/passwords/email.blade.php' => 'auth/passwords/email.blade.php',
        'auth/passwords/reset.blade.php' => 'auth/passwords/reset.blade.php',
        'auth/register.blade.php' => 'auth/register.blade.php',
        'auth/verify.blade.php' => 'auth/verify.blade.php',
        'home.blade.php' => 'home.blade.php',
        'dashboard_layout/main.blade.php' => 'layouts/main.blade.php',
        'dashboard_layout/footer.blade.php' => 'layouts/footer.blade.php',
        'dashboard_layout/header.blade.php' => 'layouts/header.blade.php',
        'dashboard_layout/horizontal-menu.blade.php' => 'layouts/horizontal-menu.blade.php',
        'dashboard_layout/sidebar.blade.php' => 'layouts/sidebar.blade.php',
    ];
    protected  $path = __DIR__.'/../../resources/views/vuexy_html';

    /**
     * Execute the console command.
     *
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    public function handle()
    {
        if (static::hasMacro($this->argument('type'))) {
            return call_user_func(static::$macros[$this->argument('type')], $this);
        }

        if (! in_array($this->argument('type'), ['bootstrap'])) {
            throw new InvalidArgumentException('Invalid preset.');
        }

        $this->ensureDirectoriesExist();
        $this->exportViews();

        if (! $this->option('views')) {
            $this->exportBackend();
        }

        $this->info('Authentication scaffolding generated successfully.');
    }

    /**
     * Create the directories for the files.
     *
     * @return void
     */
    protected function ensureDirectoriesExist()
    {
        if (! is_dir($directory = $this->getViewPath('layouts'))) {
            mkdir($directory, 0755, true);
        }

        if (! is_dir($directory = $this->getViewPath('auth/passwords'))) {
            mkdir($directory, 0755, true);
        }
    }

    /**
     * Export the authentication views.
     *
     * @return void
     */
    protected function exportViews()
    {
        foreach ($this->views as $key => $value) {
            if (file_exists($view = $this->getViewPath($value)) && ! $this->option('force')) {
                if (! $this->confirm("The [{$value}] view already exists. Do you want to replace it?")) {
                    continue;
                }
            }

            copy(
               $this->path.'/'.$key,
                $view
            );
        }
    }

    /**
     * Export the authentication backend.
     *
     * @return void
     */
    protected function exportBackend()
    {
        $this->callSilent('ui:controllers');

        $controller = app_path('Http/Controllers/HomeController.php');

        if (file_exists($controller) && ! $this->option('force')) {
            if ($this->confirm("The [HomeController.php] file already exists. Do you want to replace it?")) {
                file_put_contents($controller, $this->compileControllerStub());
            }
        } else {
            file_put_contents($controller, $this->compileControllerStub());
        }

        file_put_contents(
            base_path('routes/web.php'),
            file_get_contents(__DIR__.'/../Route/route.php'),
            FILE_APPEND
        );

//        copy(
//            __DIR__.'/../stubs/migrations/2014_10_12_100000_create_password_resets_table.php',
//            base_path('database/migrations/2014_10_12_100000_create_password_resets_table.php')
//        );
    }

    /**
     * Compiles the "HomeController" stub.
     *
     * @return string
     */
    protected function compileControllerStub()
    {
        return str_replace(
            '{{namespace}}',
            $this->laravel->getNamespace(),
            file_get_contents(__DIR__.'/../Controller/HomeController.php')
        );
    }

    /**
     * Get full view path relative to the application's configured view path.
     *
     * @param  string  $path
     * @return string
     */
    protected function getViewPath($path)
    {
        return implode(DIRECTORY_SEPARATOR, [
            config('view.paths')[0] ?? resource_path('views'), $path,
        ]);
    }
}