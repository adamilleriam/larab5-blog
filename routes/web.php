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

Route::get('/', 'HomeController@index');
Route::get('{id}/details', 'PostController@show')->name('home.post.show');
Route::auth();
Route::group(['middleware'=>'auth','namespace'=>'Admin'],function(){
    Route::get('dashboard',function (){
        return view('admin.dashboard',['title'=>'Dashboard']);
    })->name('dashboard');
    Route::resource('user','UserController')->except(['show']);
    Route::resource('category','CategoryController')->except(['show']);
    Route::resource('author','AuthorController');
    Route::resource('post','PostController');
});
