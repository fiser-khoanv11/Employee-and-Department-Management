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
	// Route::post('acc-update', 'AccCtrl@update');

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
	Route::get('/', 'HomeCtrl@index');

	// Account Routes
	Route::post('acc-login','AccCtrl@login');
	Route::get('acc-email/{email}', 'AccCtrl@checkEmail');
	Route::get('language', 'AccCtrl@language');

	// Employee Routes
	Route::get('emp/{dep?}', 'EmpCtrl@index');
	Route::get('emp-select/{skip}/{take}/{dep}/{name?}', 'EmpCtrl@select');
	Route::get('emp-select-single/{id}', 'EmpCtrl@selectSingle');
	Route::get('emp-select-names', 'EmpCtrl@selectNames');
	Route::get('emp-count/{dep}/{name?}', 'EmpCtrl@count'); // de nguye nday, neu ko co thi la 0 roif

	// Department Routes
	Route::get('dep', 'DepCtrl@index');
	Route::get('dep-select/{skip}/{take}', 'DepCtrl@select');
	Route::get('dep-select-single/{id}', 'DepCtrl@selectSingle');
	Route::get('dep-select-names', 'DepCtrl@selectNames');

	// Home Routes// la truyen tham so day, cai kia ko co ? cais ? la co the co hoac khong, a ok
	Route::get('home','HomeCtrl@index'); //sai sai, bik r
	Route::get('count','HomeCtrl@count');
});

Route::group(['middleware' => ['rechange']], function () {
	Route::get('change', 'AccCtrl@change');
});

Route::group(['middleware' => ['logout']], function () {
	Route::get('acc-logout', 'AccCtrl@logout');
});

Route::group(['middleware' => ['change']], function () {
	Route::post('acc-update', 'AccCtrl@update');
});