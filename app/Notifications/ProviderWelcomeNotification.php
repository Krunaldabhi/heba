<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ProviderWelcomeNotification extends Notification
{
    /**
     * Details of Logged in User
     *
     * @var string
     */
    public $email;

    /**
     * Message by Provider
     *
     * @var string
     */
    public $password;

    /**
     * Create a new notification instance.
     *
     * @param $email
     * @param $password
     */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
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
            ->line('Thanks for registering on Cabbie. We’re thrilled to have you on board. To get the most out of Cabbie, do login and get your next ride from Cabbie:')
            ->line("For reference, here's your login information:")
            ->line('Email : ' . $this->email)
            ->line('Password : ' . $this->password);
    }
}
