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

Route::get('/', function () {
    $topics = App\Topic::all();
    return view('welcome', compact('topics'));
});
Route::get('workspaces/{workspace}', 'WorkspacesController@index');

/* API */
Route::controller('api/v1', 'ApiController');
