<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    

    public function bookmark(){
        return $this->hasMany('App\Bookmark');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }

    public function violation(){
        return $this->hasMany('App\Violation');
    }
}
