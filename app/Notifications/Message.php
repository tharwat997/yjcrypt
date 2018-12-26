<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Message extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $from;
    public $to;
    public $message;
    public $key;

    public function __construct($_to, $_from, $_message, $_key)
    {
        $this->from = $_from;
        $this->to = $_to;
        $this->message = $_message;
        $this->key = $_key;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'key' => $this->key,
            'from' => $this->from,
            'to' => $this->to,
            'message'=> $this->message,
        ];
    }
}
