<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{

    public function index(){
        
        $resultData = DB::table('results')->get();
        return view('result',compact('resultData'));
    }

    public function getfilterdData(){

        $resultData = DB::select(DB::raw("SELECT *
        FROM results
        where subject = 'Emglish'
        and
        mark = (SELECT DISTINCT mark
            FROM results 
                where subject = 'Emglish'
            ORDER BY mark DESC
            LIMIT 1 OFFSET 2
            )"));

        return view('result',compact('resultData'));
    }


}
