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

Route::get('/', 'MainController@getAllPosts')->name('main');

Route::get('/post/{id}', 'MainController@getPost')->name('post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function()
{
    Route::resource('admin-panel', 'Admin\DashPosts')->middleware('admin');
});