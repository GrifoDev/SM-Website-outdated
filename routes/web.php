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

Auth::routes();
Route::get('/register/confirm/{token}', 'Auth\RegisterController@confirm')->name('register.confirm');

Route::get('/blog', 'Blog\PostController@index')->name('blog');
Route::get('/blog/{slug}', 'Blog\PostController@show')->name('posts.show');
Route::get('/blog/category/{slug}', 'Blog\PostController@category')->name('posts.category');
Route::get('/blog/user/{id}', 'Blog\PostController@user')->name('posts.user')->where('id', '[0-9]+');
