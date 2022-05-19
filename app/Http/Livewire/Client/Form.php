<?php

namespace App\Http\Livewire\Client;

use App\Models\Feedback;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    /**
     * @var string
     */
    public $title = '';

    /**
     * @var string
     */
    public $massage = '';

    /**
     * @var UploadedFile
     */
    public $file;

    /**
     * @var bool
     */
    public $is_can = true;

    /**
     * @var bool
     */
    public $disabled = false;

    /**
     * Init data
     *
     * @return void
     */
    public function mount()
    {
        $this->is_can = (null === auth()->user()
            ->feedbacks()
            ->where('created_at', '>', Carbon::now()->subDay()->toDateTimeString())
            ->first());
    }

    /**
     * @var string[]
     */
    protected $rules = [
        'title' => 'required|max:255',
        'massage' => 'required|max:500',
        'file' => 'required|mimes:jpg,bmp,png,doc,docx,png,pdf|max:1024',
    ];

    //Individual validation
    public function updated($propertyName)
    {
        $this->disabled = true;
        $this->validateOnly($propertyName);
        $validated = $this->validate(); //shows all errors
        $this->disabled = false;
    }

    /**
     * @return void
     */
    public function save()
    {
        $this->validate();
        $this->button_disable = true;

        $path = $this->file->store('file', 'public');

        Feedback::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'massage' => $this->massage,
            'file' => $path,
        ]);

        return redirect()->route('home');
    }

    /**
     * Clean firm
     *
     * @return void
     */
    protected function clear()
    {
        $this->title = '';
        $this->massage = '';
        $this->file = '';
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.client.form');
    }
}
