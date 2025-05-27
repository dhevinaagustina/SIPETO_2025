<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Message;

class StudentResultNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    // app/Notifications/StudentResultNotification.php
    public function toDatabase($notifiable)
    {
        return [
            'message_id' => $this->message->id,
            'status' => $this->message->status,
            'text' => $this->message->message,
            'admin_name' => $this->message->admin->name,
            'time' => now()
        ];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}