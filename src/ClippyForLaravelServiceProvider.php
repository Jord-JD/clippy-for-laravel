<?php

namespace JordJD\ClippyForLaravel;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ClippyForLaravelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('clippy', function ($expression) {
            return (new Clippy($expression))->render();
        });
    }
}