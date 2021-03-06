<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['prefix' => 'api', 'namespace' => 'Api', 'middleware' => ['auth:api', 'cors']], function () {
    Route::post('/upload', 'UploadController@upload');
    Route::get('/uploads', 'UploadController@myUploads');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/myuploads', 'HomeController@myUploads');
});
