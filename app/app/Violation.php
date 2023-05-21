<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    public function report(){
        return $this->belongTo('App\Report');
    }
}
