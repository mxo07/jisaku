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
            ->orderBy('violation_count','desc')
            ->take(20)
            ->get();

           
            $hides= User::withCount(['reports' => function($query){
                $query->where('hide_flg','1');
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
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
    public function update(Request $request, User $user)
    {
        
        $hides['hide_flg'] =1;
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
