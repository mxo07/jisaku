<?php

namespace App\Http\Controllers;

use App\Bookmark;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function store(Request $request){
        // $user = Auth::user();
        // if(!$user->is_bookmark($reportId)){
        //     $user->bookmark_reports()->attach($reportId);

        $id = $request->reports_id;
        $report = Report::find($id);
        $bookmarks = Bookmark::where('reports_id',$id)->get();

        $bookmark = new Bookmark;
        $bookmark->reports_id = $id;

        $bookmark->save();

       
        return redirect()->route('report.show',[
            'report' => $id
        ]);
    }
    
    public function destroy(Request $request,$id){

        // $user = Auth::user();
        // if($user->is_bookmark($reportId)){
        //     $user->bookmark_reports()->detach($reportId);
        // }   

        $report=Bookmark::where('reports_id',$id)->first();
        $report->delete();

        return redirect()->route('report.show',[
            'report' => $id
        ]);
   }
}
