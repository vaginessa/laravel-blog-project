<?php


Route::get('/', 'PagesController@getIndex');
Route::get('about', 'PagesController@getAbout');
Route::get('contact', 'ContactController@contact');
Route::post('contact', 'ContactController@sendMail');

Route::resource('post', 'PostsController', [
    'names' => [
        'show' => 'single-post',
    ]
]);