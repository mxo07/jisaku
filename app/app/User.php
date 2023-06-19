<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\PasswordResetUserNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetUserNotification($token));    
    }   

    public function reports(){
        return $this->hasMany('App\Report');
    }

    public function comments(){
    return $this->hasMany('App\Comment');
}

    public function bookmark(){
        return $this->hasMany('App\Bookmark');
    }

    public function violation(){
        return $this->hasMany('App\Violation');
    }
    // public function bookemark_reports(){
    //     return $this->belomgsToMany(report::class,'bookmarks','user_id','reports_id');
    // }

    // public function is_bookmark($reportId){
    //     return $this->boolmarks()->where('reports_id',$reportId)->exists();
    // }
}
