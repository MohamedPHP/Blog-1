<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*Blog Routes*/
Route::get('/', [ // posts page or index page of the project
    'uses'  =>  'PostController@getIndex',
    'as'    =>  'blog.index'
]);

Route::get('/blog/post/{postid}', [ // singel post page in front end
    'uses'  =>  'PostController@getSingle',
    'as'    =>  'blog.single'
]);
/*Blog Routes*/
Route::get('/about', function (){ // about us page
    return view('frontend.other.about');
});
Route::get('/contact', [ // contact us page
    'uses'  =>  'MessageController@getContactIndex',
    'as'    =>  'contact'
]);

Route::group(['prefix' => '/admin'], function (){ // all the admin routes ara here
    Route::get('/', [
        'uses'  =>  'AdminController@getIndex',
        'as'    =>  'admin.index'
    ]);
    // start posts
    Route::get('/blog/posts', [
        'uses'  =>  'PostController@getPostIndex',
        'as'    =>  'admin.blog.index'
    ]);
    Route::get('/blog/post/{postid}', [
        'uses'  =>  'PostController@getSinglePostBackend',
        'as'    =>  'admin.blog.post'
    ]);
    Route::get('/blog/posts/create', [
        'uses'  =>  'PostController@getCreatePost',
        'as'    =>  'admin.blog.create_post'
    ]);
    Route::post('/blog/post/create', [
        'uses'  =>  'PostController@postCreatePost',
        'as'    =>  'admin.blog.post.create'
    ]);
    Route::get('/blog/posts/edit/{id}', [
        'uses'  =>  'PostController@getEditPost',
        'as'    =>  'admin.blog.edit_post'
    ]);
    Route::post('/blog/post/update', [
        'uses'  =>  'PostController@postEditPost',
        'as'    =>  'admin.blog.post.update'
    ]);

    Route::get('/blog/posts/delete/{id}', [
        'uses'  =>  'PostController@delete',
        'as'    =>  'admin.blog.delete'
    ]);
    // end posts

    // start cats
    Route::get('/blog/cats', [
        'uses'  =>  'CatController@getCats',
        'as'    =>  'admin.blog.cats'
    ]);

    Route::post('/blog/cats/store', [
        'uses'  =>  'CatController@store',
        'as'    =>  'admin.cats.store'
    ]);
    Route::post('/blog/cats/update', [
        'uses'  =>  'CatController@update',
        'as'    =>  'admin.cats.update'
    ]);

    Route::get('/blog/cats/delete/{id}', [
        'uses'  =>  'CatController@delete',
        'as'    =>  'admin.cats.delete'
    ]);

    // end cats



});
