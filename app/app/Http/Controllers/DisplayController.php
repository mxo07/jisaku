<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class DisplayController extends Controller
{
    //
    public function index(){

        $report = new report;

        $all = $report->all()->toArray();

        return view('top',[
            'reports' => $all,
        ]);
    }
}
