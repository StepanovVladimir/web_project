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

Route::get('/', 'MainController@index')->name('main');

Route::get('/post/{id}', 'MainController@show')->where('id', '\d+')->name('post.show');

Route::get('/category/{id}', 'MainController@showCategory')->where('id', '\d+')->name('category.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function()
{
    Route::post('/comments', 'CommentsController@store')->name('comments.store');
    Route::get('/home/comments', 'CommentsController@show')->name('user.comments.show');
    Route::delete('/comment/{id}', 'CommentsController@destroy')->where('id', '\d+')->name('comment.destroy');
    
    Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function()
    {
        Route::get('/post/create', 'Admin\DashPosts@create')->name('post.create');
        Route::post('/post', 'Admin\DashPosts@store')->name('post.store');
        Route::get('/post/{id}/edit', 'Admin\DashPosts@edit')->where('id', '\d+')->name('post.edit');
        Route::put('/post/{id}', 'Admin\DashPosts@update')->where('id', '\d+')->name('post.update');
        Route::delete('/post/{id}', 'Admin\DashPosts@destroy')->where('id', '\d+')->name('post.destroy');
        
        
        Route::get('/comments', 'Admin\CommentsController@show')->name('comments.show');
        
        
        Route::get('/categories', 'Admin\CategoriesController@index')->name('categories.index');
        Route::get('/categories/create', 'Admin\CategoriesController@create')->name('categories.create');
        Route::post('/categories', 'Admin\CategoriesController@store')->name('categories.store');
        Route::get('/categories/{id}/edit', 'Admin\CategoriesController@edit')->where('id', '\d+')->name('categories.edit');
        Route::put('/categories/{id}', 'Admin\CategoriesController@update')->where('id', '\d+')->name('categories.update');
        Route::delete('/categories/{id}', 'Admin\CategoriesController@destroy')->where('id', '\d+')->name('categories.destroy');
    });
});