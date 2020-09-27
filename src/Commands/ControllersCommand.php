<?php

namespace Moman12\DashboardUi\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;
use Illuminate\Support\Facades\File;
class ControllersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ui:controllers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffold the authentication controllers';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (! is_dir($directory = app_path('Http/Controllers/Auth'))) {
            mkdir($directory, 0755, true);
        }

        $filesystem = new Filesystem;

        collect($filesystem->allFiles(__DIR__.'/../../stubs/Auth'))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    app_path('Http/Controllers/Auth/'.Str::replaceLast('.stub', '.php', $file->getFilename()))
                );
            });

        $this->info('Authentication scaffolding generated successfully.');
        $helpersFilePath = app_path('helpers.php');

        if (File::exists($helpersFilePath)) {
            $this->info('Looks like you\'ve already created a helpers file');

            return;
        }

        File::put($helpersFilePath, $this->helpersFileContents());
    }

    protected function helpersFileContents()
    {
        return <<<EOT
                <?php
                function getPublicPathOnServer(){
                    // just for check if this on local server or production server
                    if(\$_SERVER["SERVER_NAME"]=='local.path'){
                        return public_path();
                    }
                    return 'server path';
                }
                function saveFile(\$file, \$direction)
                {
                    \$mime = \$file->getClientOriginalExtension();
                    \$dir = '/images/'. \$direction ;
                    File::exists(getPublicPathOnServer().'/images/'. \$direction .'/') or File::makeDirectory(getPublicPathOnServer().'images/'.\$direction, 0755, true);
                    File::exists(getPublicPathOnServer() .'/'. \$dir) or File::makeDirectory(getPublicPathOnServer(). \$dir, 0755, true);
                    \$file_name = rand(10000, 99999) . '.' . \$mime;
                    \$file->move(getPublicPathOnServer().\$dir, \$file_name);
                    \$data = ['name'=>\$file_name,'path'=>\$dir.'/'.\$file_name];
                    return \$data ;
                }
EOT;
    }
}