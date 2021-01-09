<?php

namespace Domains\Teams\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TeamMemberInvite extends Notification
{
    use Queueable;

    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @return string[]
     *
     * @psalm-return array{0: string}
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return $this->getMessage();
    }

    public function getMessage(): static
    {
        return (new MailMessage)
            ->subject(config('app.name') . ': invitation ')
            ->greeting('Hi,')
            ->line('We invite you to join our team!')
            ->line('Please click the link bellow.')
            ->action('Register', $this->url)
            ->line('Thank you')
            ->line(config('app.name') . ' Team')
            ->salutation(' ');
    }
}
