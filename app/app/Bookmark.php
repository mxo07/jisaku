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

    protected $table='bookmarks';
    public function bookmark(){
        return $this->belongsTo('App\User');
        return $this->belongsTo('App\Bookmark'); 
    }

    public function bookmark_exist($user_id,$reports_id){
        return Bookmark::where('user_id',$user_id)
        ->where('reports_id',$reports_id)->exists();
}}