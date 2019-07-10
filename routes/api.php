<?php

use Illuminate\Http\Request;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/demo', function () {
    echo 'Hello API LARAVEL';
});

Route::get('/all-categories', [
    'uses' => 'ApiController@allCategories',
    'as' => 'all-categories'
]);

Route::get('/all-published-categories', [
    'uses' => 'ApiController@allPublishedCategories',
    'as' => 'all-published-categories'
]);

Route::get('/all-published-blogs', [
    'uses' => 'ApiController@allPublishedBlogs',
    'as' => 'all-published-blogs'
]);

Route::get('/blog-by-category-id/{id}', [
    'uses' => 'ApiController@blogByCategoryId',
    'as' => 'blog-by-category-id'
]);

Route::get('/blog-details/{id}', [
    'uses' => 'ApiController@blogDetails',
    'as' => 'blog-details'
]);





Route::get('/login', [
    'uses' => 'ApiController@login',
    'as' => 'login'
]);
