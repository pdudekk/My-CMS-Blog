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

// Pages routes



Route::get('/about', 'PagesController@getAbout');

Route::get('/contact', 'PagesController@getContact');

Route::get('/login', 'PagesController@getLogin');

Route::get('/messages', 'MessagesController@getMessages');

Route::post('/contact/submit', 'MessagesController@submit');

//Sessions routes

Route::get('/logout', 'SessionsController@destroy');

Route::get('/login', 'SessionsController@create');

Route::post('/login/submit', 'SessionsController@store');

//Register routes

Route::post('/create/submit', 'RegisterController@store');

Route::get('/register', 'RegisterController@create');



//admin routes

Route::prefix('admin')->group(function (){

    Route::get('/showPost', 'PostController@showPost')->name('show.posts');
    Route::get('/login', 'AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'PostController@index')->name('admin.post');
    Route::post('/submit', 'PostController@addPost');
    Route::post('/editPost/submit', 'PostController@editPost');
    Route::get('/delete/{id}', 'PostController@deletePost');
    Route::get('/dontDelete', 'PostController@dontDelete');
    Route::post('/deleteComment', 'PostController@deleteComment');
});

    Route::get('admin/showDelete/{id}', 'PostController@showDeletePost');
    Route::get('admin/edit/{id}', 'PostController@showEditPost');

    Route::get('/', 'Controller@getPosts')->name('home');


    Route::get('post/{id}', array('as' => 'single.post', 'uses' => 'Controller@singlePost'));

    Route::get('page/{i}', array('as' => 'page.i', 'uses' => 'Controller@pagei'));

    Route::post('comment/post', 'CommentController@newComment');
