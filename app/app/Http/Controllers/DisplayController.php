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

        $user= User::where('id',Auth::id())->first();
    //    dd($user);

        $reports = Report::with('user')->orderBy('created_at','desc')->get();

        // 日付検索
   
        $from = $request->input('from');   
        $reports = Report::get();
        $search = $request->input('search');
        $query =Report::query();

     //日付が選択されたら
     if (isset($from)) {

        $query ->whereDate('created_at','>=',$from);
         
     } 

        if(isset($search)){

            $query->where('title','like',"%{$search}%")
                  ->orWhere('text','like',"%{$search}%")
                  ->orWhere('adress','like',"%{$search}%");
        }
       
        $reports = $query->orderBy('created_at','desc')->get();

        return view('top',[
            'user' => $user,
            'reports' => $reports,
            'from'   => $from,
            'search' => $search
        ]);
    }
}
