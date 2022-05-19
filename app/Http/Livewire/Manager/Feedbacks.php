<?php

namespace App\Http\Livewire\Manager;

use App\Models\Feedback;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;

class Feedbacks extends Component
{
    /**
     * @var array
     */
    public $statuses = [];

    /**
     * @var bool
     */
    public $is_alert = false;

    /**
     * Init data
     *
     * @return void
     */
    public function mount()
    {
        $this->statuses = config('feedbacks.statuses', []);
    }

    /**
     * Change items status
     *
     * @param Feedback $feedback
     * @param $status
     * @return void
     */
    public function changeStatus(Feedback $feedback, $status)
    {
        $feedback->update(['status' => $status]);
        $this->is_alert = true;
    }

    /**
     * Hide alert
     *
     * @return void
     */
    public function alertClose()
    {
        $this->is_alert = false;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.manager.feedbacks', [
            'feedbacks' => Feedback::with('user:id,name,email')
                ->orderByDesc('id')
                ->paginate()
        ]);
    }
}
