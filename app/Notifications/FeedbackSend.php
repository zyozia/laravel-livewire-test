<?php

namespace App\Notifications;

use App\Models\Feedback;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FeedbackSend extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var Feedback
     */
    public $feedback;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New feedback #' . $this->feedback->id)
            ->line("Client name: {$notifiable->name}")
            ->line("Client email: {$notifiable->email}")
            ->line('------------------------')
            ->line("Title: {$this->feedback->title}")
            ->line("Massage: {$this->feedback->massage}")
            ->action('Open file', url(\Illuminate\Support\Facades\Storage::url($this->feedback->file)))
            ->line("Created At: {$this->feedback->created_at}")
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
