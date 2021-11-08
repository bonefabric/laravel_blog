<?php

use Illuminate\Support\Facades\Route;

/** User */

Route::get('/', function () {
	return view('welcome');
});

/** End user */

/** Admin */

Route::view('/login', 'admin.login')
	->middleware('guest')
	->name('login');

Route::post('/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])
	->middleware('guest');

Route::post('/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])
	->middleware('auth')
	->name('logout');


Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {

	Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'panel'])->name('admin');

	Route::resource('/posts', \App\Http\Controllers\Admin\PostsController::class);
	Route::get('/posts/{post}/tags', [\App\Http\Controllers\Admin\PostsController::class, 'tags'])->name('posts.tags');
	Route::post('/posts/{post}/tags', [\App\Http\Controllers\Admin\PostsController::class, 'updateTags'])->name('posts.updateTags');

	Route::resource('/tags', \App\Http\Controllers\Admin\TagsController::class);

});

/** End admin */
