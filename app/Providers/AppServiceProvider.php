<?php

namespace App\Providers;

use App\Models\Feedback;
use App\Observers\FeedbackObserver;
use Illuminate\Support\ServiceProvider;

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
        Feedback::observe(FeedbackObserver::class);
    }
}
