<?php


Route::get('/login', 'Auth\AuthController@authenticate');
Route::post('/login', 'Auth\AuthController@authenticate');
Route::get('/logout', 'Auth\AuthController@logout');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group( ['middleware' => 'auth'] ,function (){
    Route::get('/', 'ProjectsController@index');

// Users Routes
    Route::get('/user', 'UsersController@index');
    Route::get('/user/create', 'UsersController@create');
    Route::post('/user/create', 'UsersController@create');


// Project Routes
    Route::get('/projects', 'ProjectsController@index');
    Route::get('/projects/{id}', 'ProjectsController@show');
    Route::get('/projects/delete/{id}', 'ProjectsController@delete');
    Route::get('/projects/create', 'ProjectsController@create');
    Route::post('/projects/create', 'ProjectsController@create');


// Post Its Route
    Route::get('/postits', 'PostItController@index');
    Route::get('/postits/create', 'PostItController@create');
    Route::post('/postits/create', 'PostItController@create');
    Route::post('/postits/update-status/{id}', 'PostItController@updateStatus');
});


