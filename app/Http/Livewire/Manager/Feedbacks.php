<?php

namespace App\Http\Livewire\Manager;

use App\Models\Feedback;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;

class Feedbacks extends Component
{
    /**
     * Init data
     *
     * @return void
     */
    public function mount()
    {
        //
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.manager.feedbacks', [
            'feedbacks' => Feedback::with('user:id,name,email')->paginate()
        ]);
    }
}
