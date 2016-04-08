<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function statistika(){

        return view('statistika');
    }
    public function unelogi(){

        return view('unelogi');
    }


    //
    //
}
