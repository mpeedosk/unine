<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Carbon\Carbon;

class LogController extends Controller
{
    // ainult sisselogitud kasutajatele
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware("logowner", ['only' => 'edit']);
    }

    public function logs(){
        $logs = Auth::User()->logs()->latest()->simplePaginate(7);

        return $logs;
    }

    public function index(){

        $allLogs = Auth::User()->logs();
        $logs = $allLogs->latest()->simplePaginate(7);
//        $users = DB::table('users')->select(DB::raw('count(*) as user_count, first_name'))->groupBy('first_name')->get();
        $logCount = $allLogs->count();

        return view('unelogi',compact('logs', 'logCount'));
    }

    public function edit(Log $log){
        $logs = Auth::User()->logs()->latest()->simplePaginate(7);
        // valime praeguse logiga seotud ärkamisaja
        $times = DB::table('sleep')->join('logs', 'sleep.id', '=', 'logs.sleep_id')->select('sleep.went_to_sleep', 'sleep.woke_up')->where('logs.id', '=', $log->id)->get();
//        dd($times);

        // kui kasutaja proovib teise kasutaja logisid lugeda

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


       /* $title = $request-> title;
        $body = $request -> body;
        $date = date("Y-m-d", strtotime($request -> date));
        $user_id = Auth::id();
        $datetime = Carbon::now();
        $current_time = $datetime -> toDateTimeString();

        DB::insert('INSERT INTO `logs` (title, body, date, user_id, created_at, updated_at) values (?,?,?,?,?,?)',[$title, $body, $date, $user_id ,$current_time, $current_time]);*/

        $log = new Log;

        $log -> body = $request -> body;
        $log -> title = $request -> title;
        $log -> date = date("Y-m-d", strtotime($request -> date));

        Auth::User()->logs()->save($log);

        return back();
    }
}
