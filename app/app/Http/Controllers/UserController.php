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

       $reports = Report::join('users','reports.user_id','users.id')->where('user_id',\Auth::user()->id)
       ->orderBy('reports.created_at','desc')->get();
       
       $comments = Comment::join('reports','comments.reports_id','reports.id')->
       join('users','comments.user_id','users.id')->where('reports.hide_flg',0)->where('comments.user_id',\Auth::user()->id)
       ->orderBy('comments.created_at','desc')->get();
   
    //    $bookmarks = Bookmark::join('reports','bookmarks.reports_id','reports.id')
    //    ->join('users','bookmarks.user_id','users.id')
    //    ->where('bookmarks.user_id',\Auth::user()->id)
    //    ->get();

       $bookmarks = Report::join('users','reports.user_id','users.id')->
       join('bookmarks','reports.id','bookmarks.reports_id')->where('bookmarks.user_id',\Auth::user()->id)
       ->get();


        return view('mypage',[
            'user'  => $user,
            'reports' => $reports,
            'comments' =>  $comments,
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
        $reports = Report::where('user_id',$id)->orderBy('created_at','desc')->get();

        return view('user_home',[
            'user' => $user,
            'reports' => $reports,
          
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,User $user)
    {

       return view('user_edit',['user' =>$user,]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
    // dd($user);
        $img_i =$request->file('icon');
        if(isset($img_i)){

        $i_pic = 'icon_img';
        $file_name = $request->file('icon')->getClientOriginalName();
        $request->file('icon')->storeAs('public/'.$i_pic,$file_name);

         $user->icon=$file_name;
        }
        // $pic = 'icon_img';
        // $file_name = $request->file('icon')->getClientOriginalName();
        // $request->file('icon')->storeAs('public/'.$i_pic,$file_name);
        $columns = ['name','profile'];

        foreach($columns as $column){
             $user->$column = $request->$column;
        }
       
       
        $user->save();

        return redirect('/users');
    
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

        session()->flash('flash_msg','退会しました。ご利用ありがとうございました。');
        // return view('delete_complete');
        return redirect('/');
    }
}
