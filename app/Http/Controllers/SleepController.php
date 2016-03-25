<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Sleep;

class SleepController extends Controller
{
    public function index(){


//        $sleeps = DB::table('sleep')->get();
        $sleeps = Sleep::all();

        return view('unelogi',compact('sleeps'));
    }
}
