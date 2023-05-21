<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    public function report(){
        return $this->belongTo('App\Report');
    }
}
