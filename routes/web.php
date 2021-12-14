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

Route::get('/','BlogsController@index')->name('home');
Route::get('/sortDesc','BlogsController@sort')->name('sortDesc');
Auth::routes();




Route::group(['middleware'=>'auth'],function(){


Route::post('/blogs/store','BlogsController@store')->name("blogs.store");
Route::get('/imported-blogs', 'BlogsController@importBlogs')->middleware('admin')->name('ImportedBlogs');
    Route::get('/my-blogs', 'BlogsController@myBlogs');
}
);


