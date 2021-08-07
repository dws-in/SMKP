<?php

namespace App\Providers;

use App\Services\QRCodeServiceInterface;
use App\Services\QRCodeServiceLibrary1;
use App\Services\QRCodeServiceLibrary2;
use Illuminate\Support\ServiceProvider;

class QRCodeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->bind(QRCodeServiceInterface::class, QRCodeServiceLibrary1::class);
    }
}
