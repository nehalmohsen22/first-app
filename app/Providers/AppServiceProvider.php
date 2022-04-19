<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Jobs\ProcessPodcast;
use App\Services\AudioProcessor;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
   
 
     $this->app->bindMethod([ProcessPodcast::class, 'handle'], function ($job, $app) {
    return $job->handle($app->make(AudioProcessor::class));
       });
    }
}
