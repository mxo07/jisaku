<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Report;
use App\Bookmark;
use App\Comment;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = Auth::user();

       $reports = Report::where('user_id',\Auth::user()->id)->get();
       $comments = Comment::where('user_id',\Auth::user()->id)->get();
       $bookmarks = Bookmark::where('user_id',\Auth::user()->id)->get();

        return view('mypage',[
            'reports' => $reports,
            'commments' =>  $comments,
            'bookmarks' => $bookmarks
        ]);

       
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
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::find($id);
        return view('user_home',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       $user = User::where('id',\Auth::user()->id)->get();


       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $img_i =$request->file('icon');
        if(isset($img_i)){

        $i_pic = 'icon_img';
        $file_name = $request->file('icon')->getClientOriginalName();
        $request->file('icon')->storeAs('public/'.$i_pic,$file_name);

         $user->icon=$file_name;
        }
        $columns = ['name','email','profile'];

        foreach($columns as $column){
             $user->$column = $request->$column;
        }
       
       
        $user->save();

        return redirect('/');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/');
    }
}
