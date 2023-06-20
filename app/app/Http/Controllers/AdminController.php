<?php

namespace App\Http\Controllers;

use App\User;
use App\Report;
use App\Comment;
use App\Bookmark;
use App\Violation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        

        // if(User::where('role','1')){
           
            $violations = Report::withCount('violation')
            ->where('hide_flg','0')
            ->orderBy('violation_count','desc')
            ->take(20)
            ->get();

           
            $hides= User::withCount(['reports' => function($query){
                $query->where('active','0')
                      ->where('hide_flg','1');
            }])
            ->orderBy('reports_count','desc')
            ->take(10)
            ->get();
            
            return view('admin_top',[
                'violations' => $violations,
                'hides'    => $hides
               
        ]);
        // }

          
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reports =Violation::join('reports','violations.report_id','reports.id')
        ->where('report_id',$id)
       ->get();

       return view('violationdetail',['reports' =>$reports]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

       
        

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

    //  利用停止
    public function hide(int $hides)
    {
       
        $hide = User::find($hides);
    
        $hide['active'] =1;
        
        $hide->save();

         return redirect('/admin');
    }

    //  レポート非公開
    public function delreport(int $violations)
    {
       
        $del = Report::find($violations);
    
        $del['hide_flg'] =1;
        
        $del->save();

         return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
