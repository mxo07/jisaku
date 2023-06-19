<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    protected $fillable = ['id','title','text','adress','user_id'];


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function bookmark(){
        return $this->hasMany('App\Bookmark');
    }
    
    
    public function isLikedBy($user): bool {
        return bookmark::where('user_id', $user->id)->where('reports_id', $this->id)->first() !==null;
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }

    public function violation(){
        return $this->hasMany('App\Violation');
    }
}
