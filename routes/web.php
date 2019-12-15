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

Route::get('/', 'PostsController@index')->name('main');

Route::get('/post/{id}', 'PostsController@show')->where('id', '\d+')->name('post.show');

Route::get('/category/{id}', 'PostsController@showCategory')->where('id', '\d+')->name('category.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/popularcategories', 'CategoriesController@getPopular')->name('popular.categories');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/home/views', 'ViewsController@show')->name('views.show');
    
    Route::put('/like', 'LikesController@put')->name('like.put');
    Route::get('/home/likes', 'LikesController@show')->name('like.show');
    
    Route::post('/comments', 'CommentsController@store')->name('comments.store');
    Route::get('/home/comments', 'CommentsController@show')->name('user.comments.show');
    Route::put('/comments/{id}', 'CommentsController@update')->where('id', '\d+')->name('comment.update');
    Route::delete('/comment', 'CommentsController@destroy')->name('comment.destroy');
    
    Route::group(['middleware' => 'deletingComments', 'prefix' => 'moderate'], function()
    {
        Route::get('/comments', 'Admin\CommentsController@show')->name('comments.show');
    });
    
    Route::group(['middleware' => 'managingPosts'], function()
    {
        Route::get('/post/create', 'Admin\PostsController@create')->name('post.create');
        Route::post('/post', 'Admin\PostsController@store')->name('post.store');
        Route::get('/post/{id}/edit', 'Admin\PostsController@edit')->where('id', '\d+')->name('post.edit');
        Route::put('/post/{id}', 'Admin\PostsController@update')->where('id', '\d+')->name('post.update');
        Route::delete('/post/{id}', 'Admin\PostsController@destroy')->where('id', '\d+')->name('post.destroy');
    });
    
    Route::group(['middleware' => 'managingCatergories'], function()
    {
        Route::get('/categories', 'Admin\CategoriesController@index')->name('categories.index');
        Route::get('/categories/create', 'Admin\CategoriesController@create')->name('categories.create');
        Route::post('/categories', 'Admin\CategoriesController@store')->name('categories.store');
        Route::get('/categories/{id}/edit', 'Admin\CategoriesController@edit')->where('id', '\d+')->name('categories.edit');
        Route::put('/categories/{id}', 'Admin\CategoriesController@update')->where('id', '\d+')->name('categories.update');
        Route::delete('/categories', 'Admin\CategoriesController@destroy')->name('categories.destroy');
    });
    
    Route::group(['middleware' => 'managingUsers'], function()
    {
        Route::get('/users', 'Admin\UsersController@index')->name('users.index');
        Route::put('/users/{id}', 'Admin\UsersController@changeRole')->where('id', '\d+')->name('users.role.change');
    });
});