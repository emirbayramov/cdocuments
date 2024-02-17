<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DocumentShared extends Notification
{
    use Queueable;

    private string $name;
    private string $content;

    /**
     * Create a new notification instance.
     * @param string $name
     * @param string $content
     */
    public function __construct(int $id, string $name, string $content)
    {
        //
        $this->name = $name;
        $this->content = $content;
        $this->id = $id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('New document shared!')
                    ->line('Follow the link to see new document')
                    ->action($this->name, route('show-document', $this->id))
              ;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
