<?php

Route::get('/404', 'HandlerController@errorHandler');

Route::get('/', [
    'uses' => 'WelcomeController@index',
    'as' => '/'
]);

Route::get('/category-blog/{id}/{name}', [
    'uses' => 'WelcomeController@category',
    'as' => 'category-blog'
])->middleware('visitor');

Route::get('/blog-details/{id}/{name}', [
    'uses' => 'WelcomeController@blogDetails',
    'as' => 'blog-details'
]);

Route::post('/new-comment', [
    'uses' => 'CommentController@newComment',
    'as' => 'new-comment'
]);

//==========================

Route::get('/singUp', [
    'uses' => 'SingUpCntroller@singUp',
    'as' => 'singUp'
]);

Route::get('/mail-check/{email}', [
    'uses' => 'SingUpCntroller@mailCheck',
    'as' => 'mail-check'
]);

Route::post('/new-visitor', [
    'uses' => 'SingUpCntroller@newVisitor',
    'as' => 'new-visitor'
]);

Route::get('/visitor-login', [
    'uses' => 'SingUpCntroller@visitorLogin',
    'as' => 'visitor-login'
]);

Route::post('/new-sing-in', [
    'uses' => 'SingUpCntroller@newSingIn',
    'as' => 'new-sing-in'
]);

Route::post('/visitor-logout', [
    'uses' => 'SingUpCntroller@visitorLogout',
    'as' => 'visitor-logout'
]);

Route::get('/about-us', [
    'uses' => 'WelcomeController@about',
    'as' => 'about-us'
]);

Route::get('/service', [
    'uses' => 'WelcomeController@service',
    'as' => 'service'
]);

Route::get('/contact', [
    'uses' => 'WelcomeController@contact',
    'as' => 'contact'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

 Route::group(['middleware' => ['blog']], function () {

    Route::get('/manage-comments', [
        'uses' => 'CommentController@manageComments',
        'as' => 'manage-comments'
    ]);

    Route::get('/published-comment/{id}', [
        'uses' => 'CommentController@publishedComment',
        'as' => 'published-comment',
    ]);
    Route::get('/unpublished-comment/{id}', [
        'uses' => 'CommentController@unpublishedComment',
        'as' => 'unpublished-comment',
    ]);

    Route::get('/edit-comment/{id}', [
        'uses' => 'CommentController@editComment',
        'as' => 'edit-comment',
    ]);

    Route::post('/update-comment', [
        'uses' => 'CommentController@updateComment',
        'as' => 'update-comment',
    ]);

    Route::get('/delete-comment/{id}', [
        'uses' => 'CommentController@deleteComment',
        'as' => 'delete-comment',
    ]);

//============Start Category=================//
    Route::get('/create-category', [
        'uses' => 'CategoryController@createCategory',
        'as' => 'create-category'
    ]);

    Route::post('/store', [
        'uses' => 'CategoryController@store',
        'as' => 'store'
    ]);

    Route::get('/manage-category', [
        'uses' => 'CategoryController@manageMategory',
        'as' => 'manage-category'
    ]);

    Route::get('/published-category/{id}', [
        'uses' => 'CategoryController@publishedCategory',
        'as' => 'published-category',
    ]);
    Route::get('/unpublished-category/{id}', [
        'uses' => 'CategoryController@unpublishedCategory',
        'as' => 'unpublished-category',
    ]);

    Route::get('/edit-category/{id}', [
        'uses' => 'CategoryController@editCategory',
        'as' => 'edit-category',
    ]);

    Route::post('/update-category', [
        'uses' => 'CategoryController@updateCategory',
        'as' => 'update-category',
    ]);

    Route::get('/delete-category/{id}', [
        'uses' => 'CategoryController@deleteCategory',
        'as' => 'delete-category',
    ]);
//============End Category=================//
//
//============Start Blog=================//
    Route::get('/create-blog', [
        'uses' => 'BlogController@createBlog',
        'as' => 'create-blog'
    ]);

    Route::post('/store-blog', [
        'uses' => 'BlogController@storeBlog',
        'as' => 'store-blog'
    ]);

    Route::get('/manage-blog', [
        'uses' => 'BlogController@manageBlog',
        'as' => 'manage-blog'
    ]);

    Route::get('/published-blog/{id}', [
        'uses' => 'BlogController@publishedBlog',
        'as' => 'published-blog',
    ]);
    Route::get('/unpublished-blog/{id}', [
        'uses' => 'BlogController@unpublishedBlog',
        'as' => 'unpublished-blog',
    ]);

    Route::get('/edit-blog/{id}', [
        'uses' => 'BlogController@editBlog',
        'as' => 'edit-blog',
    ]);

    Route::post('/update-blog', [
        'uses' => 'BlogController@updateBlog',
        'as' => 'update-blog',
    ]);

    Route::get('/delete-blog/{id}', [
        'uses' => 'BlogController@deleteBlog',
        'as' => 'delete-blog',
    ]);
//============End Blog=================//
 });
