<?php

namespace Moman12\DashboardUi\Commands;

use Illuminate\Console\Command;
use InvalidArgumentException;
class DashboardUiCommand extends Command
{
    protected $signature = 'ui
                    { type : The preset type (bootstrap, vue, react) }
                    { --auth : Install authentication UI scaffolding }
                    { --option=* : Pass an option to the preset command }';

    public $description = 'Swap the front-end scaffolding for the application';

    public function handle()
    {
        if (static::hasMacro($this->argument('type'))) {
            return call_user_func(static::$macros[$this->argument('type')], $this);
        }

        if (! in_array($this->argument('type'), ['bootstrap', 'vue', ])) {
            throw new InvalidArgumentException('Invalid preset.');
        }

        $this->{$this->argument('type')}();

        if ($this->option('auth')) {
            $this->call('ui:auth');
        }
    }

    protected function bootstrap()
    {
        Presets\Bootstrap::install();

        $this->info('Bootstrap scaffolding installed successfully.');
        $this->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
    }

    /**
     * Install the "vue" preset.
     *
     * @return void
     */
    protected function vue()
    {
        Presets\Bootstrap::install();
        Presets\Vue::install();

        $this->info('Vue scaffolding installed successfully.');
        $this->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
    }
}
