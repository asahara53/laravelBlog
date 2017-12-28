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

Route::group(['prefix' => '/posts'], function($router) {
    $router->get('/show/{id}', 'PostsController@show');
    $router->get('/create', 'PostsController@create');
    $router->post('/create', 'PostsController@store');
    $router->get('/edit/{id}', 'PostsController@edit');
    $router->post('/edit', 'PostsController@regist');
    $router->get('/delete/{id}', 'PostsController@delete');
    $router->post('/{id}/comments', 'CommentsController@store');
    $router->post('/{post}/comments', 'CommentsController@create');
    $router->delete('{post}/comments/{comment}', 'CommentsController@destroy');
});
