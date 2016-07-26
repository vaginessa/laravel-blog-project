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

Route::auth();
Route::get('/home', 'HomeController@index');
