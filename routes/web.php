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

Route::name('posts_path')->get('/posts', 'postController@index');

Route::name('post_create_path')->get('/posts/create', 'postController@create');

Route::name('post_path')->get('/posts/{post}', 'postController@show');

Route::name('save_post_path')->post('/posts', 'postController@save');

Route::name('edit_post_path')->get('/posts/{post_id}/edit', 'postController@edit');

Route::name('update_post_path')->put('/posts/{post_id}', 'postController@update');

Route::name('delete_post_path')->delete('/posts/{post}', 'postController@delete');