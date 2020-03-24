<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ProviderReminderMessageNotification extends Notification
{
    /**
     * Details of Logged in User
     *
     * @var array
     */
    public $user;

    /**
     * Message by Provider
     *
     * @var string
     */
    public $message;

    /**
     * Create a new notification instance.
     *
     * @param $user
     * @param $message
     */
    public function __construct($user, $message)
    {
        $this->user = $user;
        $this->message = $message;
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
            ->subject('Provider Account Approval Reminder')
            ->line('You are receiving this email because a provider has sent a reminder message for his account approval.')
            ->line('User ID : ' . $this->user['user_id'])
            ->line('User Name : ' . $this->user['user_name'])
            ->line('User Email : ' . $this->user['email'])
            ->line('User Mobile Number : ' . $this->user['mobile'])
            ->line('User Message : ' . $this->message);
    }
}
