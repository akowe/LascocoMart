<?php

namespace App\Providers;

use App\Services\Pdf;
use Illuminate\Support\ServiceProvider;

class PdfServiceProvider extends ServiceProvider
{
       protected $defer = true;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
         $this->app->bind(Pdf::class, function ($app) {
            return new Pdf($app['config']['dompdf']);
        }); 
    }


     public function provides()
    {
        return [Pdf::class];
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
