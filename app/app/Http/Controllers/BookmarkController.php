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
       
        // $id = $request->reports_id;
        // $report = Report::find($id);
        
        // $bookmarks = Bookmark::where('reports_id',$id)->get();
        $id = Auth::user()->id;
        $bookmark = new Bookmark;   
        $reports_id = $request->reports_id; 
             
        // $bookmark->reports_id = $id;
        $bookmarks = Bookmark::where('reports_id',$id)->get();
        // $reports = Report::findOrFail($reports_id);

        // $bookmark->save();

        if ($bookmark->bookmark_exist($id, $reports_id)) {
            $bookmark = Bookmark::where('reports_id', $reports_id)->where('user_id', $id)->delete();
        }else{
            $bookmark = new Bookmark;
            $bookmark->reports_id = $request->reports_id;
            $bookmark->user_id = Auth::user()->id;
            $bookmark->save();
        }
        $BookmarksCount = Report::withCount('bookmark');

        $json = [
            'BookmarksCount' => $BookmarksCount,
        ];
        return response()->json($json);
        // return ->route('report.show',[
        //     'report' => $id
        // ]);
    }
    
    public function destroy(Request $request,$id){

        $report=Bookmark::where('reports_id',$id)->first();
        $report->delete();

        return redirect()->route('report.show',[
            'report' => $id
        ]);
   }
}
