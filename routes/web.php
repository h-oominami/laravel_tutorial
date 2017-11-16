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
/* login */
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
/**/
Route::get('posts', 'PostsController@index')->name('posts.index');
Route::post('posts', 'PostsController@store')->name('posts.store');
Route::get('posts/create', 'PostsController@create')->name('posts.create');
Route::get('posts/search', 'PostsController@search')->name('posts.search');
Route::get('posts/{post}', 'PostsController@show')->name('posts.show');
Route::put('posts/{post}', 'PostsController@update')->name('posts.update');
Route::delete('posts/{post}', 'PostsController@destroy')->name('posts.destroy');
Route::get('posts/{post}/edit', 'PostsController@edit')->name('posts.edit');
?>