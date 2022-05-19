<?php

namespace App\Observers;

use App\Models\Feedback as Model;
use App\Models\User;
use App\Notifications\FeedbackSend;


class FeedbackObserver
{
    /**
     * Handle the customer "created" event.
     *
     * @param Model  $model
     * @return void
     */
    public function created(Model $model)
    {
        $managers = User::where('level', app('config')->get("roles.level.manager"))->get();

        foreach ($managers as $manager) {
            $manager->notify(new FeedbackSend($model));
        }
    }
}
