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


Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/blog', 'PagesController@blog');
// Route::get("/about/{'id'}" , 'PagesController@aboutsection');
Route::get('/services', 'PagesController@services');
Route::get('/single/{id}', 'PagesController@showPost');
Route::get('/category/{id}', 'PagesController@showCategory');


Route::get('/settings', 'SettingsController@index');
Route::post('/settings', 'SettingsController@store')->name('settings.store');

Route::resource('posts', 'PostsController');
Route::resource('categories', 'CategoryController');
Route::resource('comments', 'CommentsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'SearchController@index');
Route::get('/search/action', 'SearchController@action')->name('search.action');


