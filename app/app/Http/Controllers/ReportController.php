<?php

namespace App\Http\Controllers;

use App\Report;
use App\Comment;
use App\Bookmark;
use Illuminate\Http\Request;
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
        $reports = Report::orederBy('created_at','desc')->get();

        return view('top')->with(['reports' => $reports]);
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
    public function store(Request $request)
    {
        $report = new Report;

        $pic = 'sample';
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/'.$pic,$file_name);

        $columns = ['title','text','adress'];

        foreach($columns as $column){
             $report->$column = $request->$column;
        }

        $report->image=$file_name;
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
        $comments = Comment::where('reports_id',$report->id)->get();
        $bookmarks = Bookmark::where('reports_id',$report->id)->get();

        return view('reportdetail',[
            'report' => $report,
            'comments' => $comments,
            'bookmarks' => $bookmarks
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
    public function update(Report $report,Request $request)
    {
        $columns =  ['title','text','image','adress'];

   foreach($columns as $column){
        $report->$column = $request->$column;
   }
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
