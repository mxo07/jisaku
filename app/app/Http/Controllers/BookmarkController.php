<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function store($reportId){
        $user = Auth::user();
        if(!$user->is_bookmark($reportId)){
            $user->bookmark_reports()->attach($reportId);
        }
        return view('reportdetail');
    }
    
    public function destroy($reportId){

        $user = Auth::user();
        if($user->is_bookmark($reportId)){
            $user->bookmark_reports()->detach($reportId);
        }   
        return view('reportdetail');
   }
}
