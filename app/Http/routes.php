<?php


Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'PagesController@getIndex');
    Route::get('about', 'PagesController@getAbout');
    Route::get('contact', ['as' => 'contact', 'uses' => 'ContactController@getContact']);
    Route::post('contact', 'ContactController@postContact');

    Route::get('blog/{slug}', ['as' => 'single-blog', 'uses' => 'BlogController@getSingle']);
    Route::get('blog', ['as' => 'blog', 'uses' => 'BlogController@getList']);

    Route::get('post/create', ['as' => 'post.create', 'uses' => 'PostsController@create']);
    Route::post('post', ['as' => 'post.store', 'uses' => 'PostsController@store']);
    Route::get('post/{post}/edit', ['as' => 'post.edit', 'uses' => 'PostsController@edit']);
    Route::put('post/{post}', ['as' => 'post.update', 'uses' => 'PostsController@update']);
    Route::delete('post/{post}', ['as' => 'post.destroy', 'uses' => 'PostsController@destroy']);

    Route::get('user/posts', ['as' => 'user.posts', 'uses' => 'PostsController@myPosts']);
    Route::auth();
});


Route::group(['prefix' => 'api/v1'], function () {
    Route::get('post/categories', 'Api\PostsController@getCategories');

    Route::resource('post', 'Api\PostsController',
        ['except' =>
            [
                'create', 'edit'
            ]
        ]);


    Route::post('user/signin', [
        'uses' => 'Api\AuthController@signin'
    ]);

});