<?php

namespace App\Http\Controllers;

use App\Violation;
use App\Report;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ViolationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $report)
    {
        $violations = Violation::where('reports_id',$report)->first();
        return view('violation_form',[
            'report' => $report
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->reports_id;
        $report = Report::find($id);
        $violations = Violation::where('reports_id',$id)->get();
        
        $violation = new Violation;
        $violation->reason = $request->reason;
        $violation->reports_id = $request->reports_id;

        $violation->save();
       
        return view('complete');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Violation  $violation
     * @return \Illuminate\Http\Response
     */
    public function show(Violation $violation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Violation  $violation
     * @return \Illuminate\Http\Response
     */
    public function edit(Violation $violation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Violation  $violation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Violation $violation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Violation  $violation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Violation $violation)
    {
        //
    }
}
