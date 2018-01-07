<?php

namespace App\Providers;

use League\Flysystem\Filesystem;
use Spatie\FlysystemDropbox\DropboxAdapter;
use Storage;
use Spatie\Dropbox\Client as DropboxClient;
use Illuminate\Support\ServiceProvider;

class DropboxServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('dropbox', function($app, $config){
            $client = new DropboxClient(
                $config['accessToken']
            );

            return new Filesystem(new DropboxAdapter($client));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
