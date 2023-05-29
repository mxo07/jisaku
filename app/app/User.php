<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function comments(){
    return $this->hasMany('App\Comment');
}

    public function is_bookmark($reportId){

        return $this->bookmarks()->where('report_id',$reportId)->exists();
    }

    public function bookmark(){
        return $this->hasMany('App\Bookmark','bookmark','report_id');
    }

    public function bookmark_reports(){
        return $this->belongsToMany('App\Report','bookmark','report_id');
    }


}
