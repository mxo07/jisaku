<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillabele = [
        'report_id', 'comment',
    ];

    
    public function report(){
        return $this->belongTo('App\Report');
    }
}
