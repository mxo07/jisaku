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
    public function index(){

        $report = new Report;
        $reports = Report::with('user')->orderBy('created_at','desc')->get();
        // $reports =$report->join('users','reports.user_id','users.id')->orderBy('reports.created_at','desc')->get();
        // $reports =User::join('reports','users.id','reports.user_id')->orderBy('reports.created_at','desc')->get();
        // dd($reports);
        // $reports   = $report->with('user')->get();

        return view('top',['reports' => $reports]);
    }
}
