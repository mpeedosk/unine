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

    Route::get('statistika', 'PagesController@statistika');



    Route::get('home', 'HomeController@index');
    Route::post('home', 'HomeController@store');


    Route::get('unelogi', 'LogController@index');
    Route::get('unelogi/{log}', 'LogController@edit');
    Route::get('unelogi/a/{log}', 'LogController@fetch');
    Route::post('unelogi', 'LogController@create');
    Route::patch('unelogi/{log}', 'LogController@update');

    Route::post('checkUser', 'Auth\AuthController@checkAvailableUser');
    Route::post('checkEmail', 'Auth\AuthController@checkAvailableEmail');

    Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
    Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

    Route::get('language/{lang}', 'LanguageController@switchLang');

    Route::get('/unearvutaja', function () {
        return view('index');
    });

    Route::get('/offline', function () {
        return view('errors.noConnection');
    });
    Route::get('/kaart', function(){
        return view('map');
    });

    Route::get('/loe_lisaks', 'PostController@index');
    Route::post('/loe_lisaks', 'PostController@store');

    Route::get('/login', function () {
        return view('auth.login');
    });
});
