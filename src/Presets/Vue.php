<?php

namespace Moman12\DashboardUi\Presets;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;

class Vue extends Preset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install()
    {
        static::ensureComponentDirectoryExists();
        static::updatePackages();
        static::updateWebpackConfiguration();
        static::updateBootstrapping();
        static::updateComponent();
        static::removeNodeModules();
    }

    /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return [
            'resolve-url-loader' => '^2.3.1',
            'sass' => '^1.20.1',
            'sass-loader' => '^8.0.0',
            'vue' => '^2.5.17',
            'vue-template-compiler' => '^2.6.10',
            "material-icons"=> "^0.3.1",
            "vue-perfect-scrollbar"=> "^0.2.1",
            "vue-sweetalert2"=> "^3.0.6",
            "vue2-dropzone"=> "^3.6.0",
            "vuesax"=>"^3.11.17",
        ] + Arr::except($packages, [
            '@babel/preset-react',
            'react',
            'react-dom',
        ]);
    }

    /**
     * Update the Webpack configuration.
     *
     * @return void
     */
    protected static function updateWebpackConfiguration()
    {
        copy(__DIR__.'/vue-stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    /**
     * Update the example component.
     *
     * @return void
     */
    protected static function updateComponent()
    {
        (new Filesystem)->delete(
            resource_path('js/components/Example.js')
        );

        copy(
            __DIR__.'/vue-stubs/components/ExampleComponent.vue',
            resource_path('js/components/ExampleComponent.vue')
        );
        copy(
            __DIR__.'/vue-stubs/components/FileManger.vue',
            resource_path('js/components/FileManger.vue')
        );
        copy(
            __DIR__.'/vue-stubs/auth/login.js',
            resource_path('js/auth/login.js')
        );
        copy(
            __DIR__.'/vue-stubs/mixins/form.js',
            resource_path('js/mixins/form.js')
        );
        copy(
            __DIR__.'/vue-stubs/profile/index.js',
            resource_path('js/profile/index.js')
        );
    }

    /**
     * Update the bootstrapping files.
     *
     * @return void
     */
    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/vue-stubs/app.js', resource_path('js/app.js'));
        copy(__DIR__.'/vue-stubs/auth.js', resource_path('js/auth.js'));
        copy(__DIR__.'/vue-stubs/event.js', resource_path('js/event.js'));
    }
}
