<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', array('as' => 'index', 'uses' => 'HomeController@index'));
Route::get('index', array('as' => 'index', 'uses' => 'HomeController@index'));
Route::get('cities/get/{id}', 'HomeController@getCities');
Route::post('people', ['as' => 'people', 'uses' => 'PeopleController@store']);
Route::get('login', ['as' => 'login', 'uses' => 'HomeController@login']);
Route::post('authenticate', ['as' => 'authenticate', 'uses' => 'HomeController@authenticate']);

Route::group(['middleware' => 'auth'], function () {
	Route::get('dashboard-admin', ['as' => 'dashboard', 'uses' => 'HomeController@dashboard']);
	Route::get('winner', ['as' => 'winner', 'uses' => 'HomeController@winner']);
	Route::get('reset', ['as' => 'reset', 'uses' => 'HomeController@reset']);
	Route::get('export', ['as' => 'export', 'uses' => 'HomeController@export']);
	Route::get('logout', function()
	{
	    Auth::logout();
	    Session::flush();
	    return Redirect::to('/');
	});
});