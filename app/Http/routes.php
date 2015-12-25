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
*/

Route::group(['middleware' => ['web']], function () {

    // Главная страница
    Route::get('/', function () { return view('welcome'); });
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::group(['middleware' => 'auth'], function () {

        // Водиели
        Route::get('/drivers', 'DriverController@index');
        Route::post('/drivers', 'DriverController@create');
        Route::post('/drivers/search/{input}', 'DriverController@search');
        Route::get('/driver/{id}', 'DriverController@single');
    });
});
