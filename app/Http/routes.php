<?php


Route::get('/', 'PagesController@getIndex');
Route::get('about', 'PagesController@getAbout');
Route::get('contact', 'ContactController@contact');
Route::post('contact', 'ContactController@sendMail');

Route::get('blog/{slug}', ['as' => 'single-blog', 'uses' => 'BlogController@getSingle']);
Route::get('blog', ['as' => 'blog', 'uses' => 'BlogController@getList']);

Route::get('post/create', ['as' => 'post.create', 'uses' => 'PostsController@create']);
Route::post('post', ['as' => 'post.store', 'uses' => 'PostsController@store']);
Route::get('post/{post}/edit', ['as' => 'post.edit', 'uses' => 'PostsController@edit']);
Route::put('post/{post}', ['as' => 'post.update', 'uses' => 'PostsController@update']);
Route::delete('post/{post}', ['as' => 'post.destroy', 'uses' => 'PostsController@destroy']);

//Route::resource('post', 'PostsController');

Route::get('user/posts', ['as' => 'user.posts', 'uses' => 'PostsController@myPosts']);
Route::auth();