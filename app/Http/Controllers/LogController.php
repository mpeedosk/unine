<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class LogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
//        $sleeps = DB::table('sleep')->get();
        $logs = Auth::User()->logs;

        return view('unelogi',compact('logs'));
    }

    public function show(Log $log){
//        $sleeps = DB::table('sleep')->get();
        $logs = Auth::User()->logs;

        return view('unelogi.show',compact('log'),compact('logs'));
    }
    protected function update(Request $request, Log $log){

        $log -> body = $request -> body;
        $log -> title = $request -> title;
        $log -> date = date("Y-m-d", strtotime($request -> date));

        $log->save();

        return back();


    }

    protected function store(Request $request){

        $log = new Log;

        $log -> body = $request -> body;
        $log -> title = $request -> title;
        $log -> date = date("Y-m-d", strtotime($request -> date));

        Auth::User()->logs()->save($log);

        return back();
    }
}
