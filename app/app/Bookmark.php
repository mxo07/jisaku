<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{

    public $timestamps = false;
    
    public function user(){
        return $this->belongTo('App\User');
    }

    public function report(){
        return $this->belongTo('App\Report');
    }
}
