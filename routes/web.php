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

/**
 * User needs to be authenticated to visit this routes
 */
Route::group(['middleware' => 'auth'], function () {
    //post create form and submitting
    Route::get('/posts/create', 'PostsController@create')->name('newPost');
    Route::post('/posts', 'PostsController@store');

    //post comment
    Route::post('/posts/{id}/comments', 'CommentsController@store');

    //logout
    Route::get('/logout', 'Auth\SessionsController@destroy')->name('logout');
});

//posts index and single post page
Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/{post}', 'PostsController@show');

//registration
Route::get('/register', 'Auth\RegisterController@create')->name('register');
Route::post('/register', 'Auth\RegisterController@store');

//login
Route::get('/login', 'Auth\SessionsController@create')->name('login');
Route::post('/login', 'Auth\SessionsController@store');

Route::post('/testRoute', 'Auth\SessionsController@store');
