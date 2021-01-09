<?php

namespace Units\Auth\Notifications;

use Domains\Users\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyUserNotification extends Notification
{
    use Queueable;

    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
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

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->line(trans('global.verifyYourUser'))
            ->action(trans('global.clickHereToVerify'), route('userVerification', $this->user->verification_token))
            ->line(trans('global.thankYouForUsingOurApplication'));
    }

    /**
     * @return array
     *
     * @psalm-return array<empty, empty>
     */
    public function toArray($notifiable): array
    {
        return [];
    }
}
