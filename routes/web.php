<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Visitor\HomeController@home');
//Route::get('admin/users','Admin\UsersController@index');


//category

Route::get('admin/blogs','Admin\BlogsController@index')->name("admin.blogs.index");
Route::get('admin/blogs/create','Admin\BlogsController@create');
Route::post('admin/categories/store','Admin\BlogsController@store');
Route::delete('admin/categories/{id}','Admin\BlogsController@delete');
Route::get('admin/categories/edit/{id}','Admin\BlogsController@edit');
Route::put('admin/categories/update/{id}','Admin\BlogsController@update');


// tage

Route::get('admin/blogs/tag','Admin\BlogsController@indexTag')->name("admin.blogs.index");
Route::get('admin/blogs/tagCreate','Admin\BlogsController@createTag');
Route::post('admin/blogs/tagStore','Admin\BlogsController@tagStore');
Route::delete('admin/tags/{id}','Admin\BlogsController@tagDelete');
Route::get('admin/tags/edit/{id}','Admin\BlogsController@tagEdit');
Route::put('admin/tags/update/{id}','Admin\BlogsController@tagUpdate');


