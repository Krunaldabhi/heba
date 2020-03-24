<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use App\Notifications\UserAddMoneyNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use NotificationChannels\WebPush\HasPushSubscriptions;


class User extends Authenticatable
{
    use HasApiTokens,Notifiable,HasPushSubscriptions;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'gender', 'email', 'mobile', 'picture', 'password', 'device_type','device_token','login_by', 'payment_mode','social_unique_id','device_id','wallet_balance','referral_unique_id', 'user_type','qrcode_url','country_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at'
    ];


    /**
     * The services that belong to the user.
     */
    public function trips()
    {
        return $this->hasMany('App\UserRequests','user_id','id');
    }


    /**
     * Send the add money message for User Information
     * 
     * @param string $user_name
     * @param string $amount
     * @param string $total_amount
     * @return void
     */
    public function sendAddMoneyNotification($user_name, $amount, $total_amount) {
        $this->notify(new UserAddMoneyNotification($user_name, $amount, $total_amount));
    }
}
