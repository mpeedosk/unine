<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class LogController extends Controller
{
    // ainult sisselogitud kasutajatele
    public function __construct()
    {
        $this->middleware('auth');

        // kui kasutaja proovib teise kasutaja logisid lugeda
        $this->middleware("logowner", ['only' => 'edit']);
    }

    // ei mäleta miks selle üldse tegin
/*    public function logs(){
        $logs = Auth::User()->logs()->latest()->simplePaginate(7);

        return $logs;
    }*/

    public function index(Request $request){

        $allLogs = Auth::User()->logs();
        $logs = $allLogs->latest()->simplePaginate(9);

        if($request->ajax()) {
            return [
                'posts' => view('unelogi.ajax.log')->with(compact('logs'))->render(),
                'next_page' => $logs->nextPageUrl()
            ];
        }

        $logCount = $allLogs->count();

        return view('unelogi',compact('logs', 'logCount'));
    }

    // tuleks kunagi ajaxi peale teha kõik
    public function edit(Request $request, Log $log){
        $logs = Auth::User()->logs()->latest()->simplePaginate(9);

        // valime praeguse logiga seotud ärkamisaja
        $times = DB::table('sleep')->join('logs', 'sleep.id', '=', 'logs.sleep_id')->select('sleep.went_to_sleep', 'sleep.woke_up')->where('logs.id', '=', $log->id)->get();

        if($request->ajax()) {
            return [
                'posts' => view('unelogi.ajax.log')->with(compact('logs'))->render(),
                'next_page' => $logs->nextPageUrl()
            ];
        }


        return view('unelogi.show', compact('times','log','logs'));
    }

    // uuendame logi väljad ning suuname kasutaja tagasi
    protected function update(Request $request, Log $log){

        $this->validate($request, [
            'body' => 'required',
            'title' => 'required',
            'date' => 'required|date_format:"d.m.Y"'
        ]);

        $log -> body = $request -> body;
        $log -> title = $request -> title;
        $log -> date = date("Y-m-d", strtotime($request -> date));

        $log->save();

        return back();


    }

    protected function store(Request $request){

        $this->validate($request, [
            'body' => 'required',
            'title' => 'required',
            'date' => 'date_format:"d.m.Y"'
        ]);


        $log = new Log;

        $log -> body = $request -> body;
        $log -> title = $request -> title;
        $log -> date = date("Y-m-d", strtotime($request -> date));

        Auth::User()->logs()->save($log);

        return back();
    }
}
