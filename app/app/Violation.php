<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    protected $fillable = ['id','report_id','user_id'];

    public function report(){
        return $this->hasMany('App\Report');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
