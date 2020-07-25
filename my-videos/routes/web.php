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

Route::get('/', 'HomeController@index');

Route::prefix('category')->group( function () {
    Route::get('/', 'CategoryController@index')->name('category.home');
    Route::get('/{categoryId}', 'CategoryController@show');
    Route::get('store', 'CategoryController@create')->name('category.register');
    Route::post('store', 'CategoryController@store')->name('category.store');
    Route::delete('delete/{category_id}', 'CategoryController@destroy')->name('category.delete');
    
    Route::get('videos/show/{videoId}', 'VideoController@show')->name('video.show');
    Route::get('videos/{categoryId}', 'CategoryController@categoryVideos')->name('category.videos');
    Route::post('videos/store', 'VideoController@store')->name('video.register');
    Route::post('video/comment/{videoId}', 'VideoController@commentStore')->name('comment.store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
