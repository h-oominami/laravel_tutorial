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
Route::get('/', 'PostsController@index')->name('posts.index');//一覧表示画面
Route::post('posts', 'PostsController@store')->name('posts.store')->middleware('auth');//記事登録
Route::get('posts/create', 'PostsController@create')->name('posts.create')->middleware('auth');//新規作成画面
Route::get('posts/search', 'PostsController@index')->name('posts.index');//検索
Route::get('posts/{post}', 'PostsController@show')->name('posts.show');//記事詳細画面
Route::put('posts/{post}', 'PostsController@update')->name('posts.update')->middleware('auth');//記事更新
Route::delete('posts/{post}', 'PostsController@destroy')->name('posts.destroy')->middleware('auth');//記事削除
Route::get('posts/{post}/edit', 'PostsController@edit')->name('posts.edit')->middleware('auth');//記事編集
/* login */
Auth::routes();
/**/