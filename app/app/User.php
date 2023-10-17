<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Notifications\VerifyEmailJP;
use App\Notifications\ResetPasswordJP as ResetPasswordNotificationJP;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'icon',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function request() {
        return $this->hasMany('App\Requests');
    }

    public function service() {
        return $this->hasMany('App\Service');
    }

    public function violation() {
        return $this->hasMany('App\Violation');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    // オーバーライド
    public function sendEmailVerificationNotification()
    {
        // $this->notify(new VerifyEmail);
        $this->notify(new VerifyEmailJP);
    }

    // オーバーライド
    public function sendPasswordResetNotification($token)
    {
        // $this->notify(new ResetPasswordNotification($token));
        $this->notify(new ResetPasswordNotificationJP($token));
    }
}
