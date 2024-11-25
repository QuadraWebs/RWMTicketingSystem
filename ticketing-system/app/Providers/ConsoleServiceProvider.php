<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Console\Kernel;

class ConsoleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            \Illuminate\Contracts\Console\Kernel::class,
            Kernel::class
        );
    }
}
