<?php

namespace App\Http\Controllers;
use App\User;
use App\Report;
use App\Comment;
use App\Bookmark;
use Illuminate\Http\Request;
use App\Http\Requests\CreateReport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;





class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $report = new Report;
        // $reports = Report::with('user')->orderBy('created_at','desc')->get();
        // $reports =$report->join('users','reports.user_id','users.id')->orderBy('reports.created_at','desc')->get();
        // $reports =User::join('reports','users.id','reports.user_id')->orderBy('reports.created_at','desc')->get();
        // dd($reports);
        // $reports   = $report->with('user')->get();

        // return view('top',['reports' => $reports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
      return view('report_form');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReport $request)
    {
        $report = new Report;
        
        $img =$request->file('image');
        if(isset($img)){

        $pic = 'sample';
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/'.$pic,$file_name);

        $report-> image = $file_name;

        }
       
        
        $columns = ['title','text','adress'];

        foreach($columns as $column){
             $report->$column = $request->$column;
        }

      
        $report->user_id = \Auth::id();
        
        $report->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        $user= User::where('id',Auth::id())->first();
        $reports   = $report->with('user')->first();
        $comments = Comment::with('user')->where('reports_id',$report['id'])->get();
        $bookmarks = Bookmark::where('reports_id',$report['id'])->get();
        
        $bookmark_model = new Bookmark;



        

        return view('reportdetail',[
            'user' => $user,
            'report' => $report,
            'comments' => $comments,
            'bookmarks' => $bookmarks,
            'bookmark_model'=>$bookmark_model
        
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {

        return view('reportedit',['report' =>$report,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Report $report,CreateReport $request)
    {
        $pic = 'sample';
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/'.$pic,$file_name);
        $columns =  ['title','text','image','adress'];

   foreach($columns as $column){
        $report->$column = $request->$column;
   }

   $report->image=$file_name;

   $report->save();
   return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();
        \Session::flash('flash_msg','削除しました。');
        return redirect('/');
    }

    public function bookmark_reports(){

        $reports = \Auth::user()->bookmark_reports()->orderBy('created_at','desc');
        $data = [
            'reports' => $reports,
        ];
        return view('reports.bookmarks',$data);
    }
}
