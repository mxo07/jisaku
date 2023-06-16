<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\User;
use App\Comment;
use App\Bookmark;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    //
    public function index(Request $request){

        
        // 日付検索
     $from = $request->input('from');

     $q_r = Report::query();
     
   
     //日付が選択されたら
     if (!empty($request['from'])) {

          $date = $q_r->whereDate('created_at','<=','$from');
         
     } 
        
        $reports = Report::with('user')->orderBy('created_at','desc')->get();
      

        return view('top',['reports' => $reports]);
    }
}
