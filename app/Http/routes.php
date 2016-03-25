<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/', function () {
        return view('index');
    });

    Route::get('home', 'PagesController@home');
    Route::get('statistika', 'PagesController@statistika');



    Route::get('unelogi', 'LogController@index');
    Route::get('unelogi/{log}', 'LogController@show');
    Route::post('unelogi/store', 'LogController@store');
    Route::post('unelogi/{log}/edit', 'LogController@update');



    Route::get('/unearvutaja', function () {
        return view('index');
    });
    Route::get('/loe_lisaks', function () {
        return view('loelisaks');
    });
    Route::get('/login', function () {
        return view('auth.login');
    });
});
