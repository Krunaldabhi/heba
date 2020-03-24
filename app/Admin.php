<?php

namespace App;

use App\Notifications\AdminResetPassword;
use App\Notifications\ProviderReminderMessageNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use NotificationChannels\WebPush\HasPushSubscriptions;

class Admin extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use HasPushSubscriptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPassword($token));
    }

    /**
     * Send the reminder message for Provider account approval.
     * 
     * @param array $user
     * @param string $message
     * @return void
     */
    public function sendProviderAccountApprovalReminder($user, $message) {
        $this->notify(new ProviderReminderMessageNotification($user, $message));
    }
}
