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

Route::get('/','PostsController@index');
Route::get('/posts/show/{id}', 'PostsController@show');
Route::get('/posts/create', 'PostsController@getCreateView');
Route::post('/posts/create', 'PostsController@create');
Route::get('/posts/edit/{id}', 'PostsController@getEditView');
Route::post('/posts/edit', 'PostsController@edit');
Route::get('/posts/delete/{id}', 'PostsController@delete');
Route::post('/posts/{post}/comments', 'CommentsController@store');
Route::post('/posts/{post}/comments', 'CommentsController@create');
Route::delete('/posts/{post}/comments/{comment}', 'CommentsController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
