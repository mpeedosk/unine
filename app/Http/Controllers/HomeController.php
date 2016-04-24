<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Sleep;
use Illuminate\Support\Facades\Auth;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = Auth::id();
        $query = "SELECT hours,DATE_FORMAT(created_at, '%d.%m') as created_at FROM sleep WHERE user_id =$userId ORDER BY id DESC LIMIT 7";
        $json = json_encode(array_reverse(DB::select(DB::raw($query))));

        return view('home', compact('json'));
    }


    /**
     * Add new sleep entry
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {


        $this->validate($request, [
            'went_to_sleep' => 'required|date_format:"H:i"',
            'woke_up_at' => 'required|date_format:"H:i"'
        ]);

        $went = strtotime($request->went_to_sleep);
        $woke = strtotime($request->woke_up_at);

        $sleep = new Sleep;
        $sleep->went_to_sleep = date("H:i", $went);
        $sleep->woke_up = date("H:i", $woke);
        $sleep->hours = $this->calculateHours($woke, $went);;

        Auth::User()->sleep()->save($sleep);

        if ($request->ajax()) {
            return [
                'hours' => $sleep->hours,
                'created_at' => DATE_FORMAT($sleep->created_at, 'd.m')
            ];
        }

        return back();
    }

    /**
     * @param $woke - time when the user woke up
     * @param $went - time when the user went to sleep
     * @return float|int
     */
    public function calculateHours($woke, $went)
    {
        $diff = round(abs($woke + 86400 - $went) / 3600, 2);
        if ($diff > 24)
            $diff -= 24;
        return $diff;
    }
}
