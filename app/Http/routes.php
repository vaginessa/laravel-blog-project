<?php


Route::get('/', 'PagesController@getIndex');
Route::get('about', 'PagesController@getAbout');
Route::get('contact', 'ContactController@contact');
Route::post('contact', 'ContactController@sendMail');

Route::get('blog/{slug}', ['as' => 'single-blog', 'uses' => 'BlogController@getSingle']);
Route::get('blog', ['as' => 'blog', 'uses' => 'BlogController@getList']);

Route::resource('post', 'PostsController', [
    'names' => [
        'show' => 'single-post',
    ]
]);

//Authentication Routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
