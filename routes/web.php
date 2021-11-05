<?php

use Illuminate\Support\Facades\Route;

/** User */

Route::group(['middleware' => 'guest'], function () {

	Route::get('/', function () {
		return view('welcome');
	});

});

/** End user */

/** Admin */

Route::view('/login', 'admin.login')
	->middleware('guest')
	->name('login');

Route::post('/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])
	->middleware('guest');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {

	Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'panel']);

});

/** End admin */
