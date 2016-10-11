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
    Route::get('/', [ // admin home page
        'uses'  =>  'AdminController@getIndex',
        'as'    =>  'admin.index'
    ]);
    Route::get('/blog/posts', [ // admin posts page
        'uses'  =>  'PostController@getPostIndex',
        'as'    =>  'admin.blog.index'
    ]);
    Route::get('/blog/post/{postid}', [ // admin posts single page
        'uses'  =>  'PostController@getSinglePostBackend',
        'as'    =>  'admin.blog.post'
    ]);
    Route::get('/blog/posts/create', [ // create post from admin
        'uses'  =>  'PostController@getCreatePost',
        'as'    =>  'admin.blog.create_post'
    ]);
    Route::post('/blog/post/create', [ // the post request to create post
        'uses'  =>  'PostController@postCreatePost',
        'as'    =>  'admin.blog.post.create'
    ]);
});
