<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FeedbackServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->bind('FeedbackSend', 'App\Services\FeedbackSend');
    }

}