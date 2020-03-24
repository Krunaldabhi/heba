<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UserAddMoneyNotification extends Notification
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
     * @var double
     */
    public $amount;

    /**
     * Message by Provider
     *
     * @var double
     */
    public $total_amount;

    /**
     * Create a new notification instance.
     *
     * @param $user_name
     * @param $amount
     * @param $total_amount
     */
    public function __construct($user_name, $amount, $total_amount)
    {
        $this->user_name = $user_name;
        $this->amount = $amount;
        $this->total_amount = $total_amount;

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
            ->subject('Added Money to User Wallet')
            ->greeting('Hi '. $this->user_name .',')
            ->line('')
            ->line('AED '. $this->amount .' was added to your Cabbie wallet. Your total wallet amount is now AED '. $this->total_amount .'.');
    }
}
