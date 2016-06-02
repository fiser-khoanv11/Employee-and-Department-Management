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
    return view('welcome');
});

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

Route::group(['middleware' => ['web']], function () {
	// Account Routes
	Route::post('acc-insert', 'AccCtrl@insert');
	Route::post('acc-update', 'AccCtrl@update');

	// Employee Routes
	Route::post('emp-insert', 'EmpCtrl@insert');
	Route::post('emp-update', 'EmpCtrl@update');
	Route::get('emp-delete/{id}', 'EmpCtrl@delete');

	// Department Routes
	Route::post('dep-insert', 'DepCtrl@insert');
	Route::post('dep-update', 'DepCtrl@update');
	Route::get('dep-delete/{id}', 'DepCtrl@delete');
});

Route::group(['middleware' => ['free']], function () {
	Route::get('/', 'EmpCtrl@redirect');

	// Account Routes
	Route::post('acc-login','AccCtrl@login');
	Route::get('acc-logout', 'AccCtrl@logout');
	Route::get('acc-email/{email}', 'AccCtrl@checkEmail');
	Route::get('language', 'AccCtrl@language');

	// Employee Routes
	Route::get('emp/{dep?}', 'EmpCtrl@index');
	Route::get('emp-select/{dep}/{name?}', 'EmpCtrl@select');
	Route::get('emp-select-single/{id}', 'EmpCtrl@selectSingle');
	Route::get('emp-select-names', 'EmpCtrl@selectNames');

	// Department Routes
	Route::get('dep', 'DepCtrl@index');
	Route::get('dep-select', 'DepCtrl@select');
	Route::get('dep-select-single/{id}', 'DepCtrl@selectSingle');
	Route::get('dep-select-names', 'DepCtrl@selectNames');

	//HOME
	Route::get('home','HomeCtrl@index');
	Route::get('countEmp','HomeCtrl@countEmp');
	Route::get('countDep','HomeCtrl@countDep');
	Route::get('countUser','HomeCtrl@countUsr');
});