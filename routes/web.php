<?php

use App\Http\Controllers\AdminUsersController;

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

Route::get('/', function () {
    return view('welcome');
});

            //admin_users route
Route::resource('admin/users', 'AdminUsersController');
Route::post('admin/users/{user}', 'AdminUsersController@update')->name('admin.update');
Route::post('admin/users/{user}/upload-image', 'AdminUsersController@dropzone')->name('admin.dropzone');
Route::get('admin/users/{user}/edit', 'AdminUsersController@edit')->name('admin.users.edit');


            //admin_posts route
Route::resource('admin/posts', 'AdminPostsController');
Route::post('admin/posts/{user}', 'AdminPostsController@update')->name('admin.dropzone');


            //admin_categories route
Route::resource('admin/categories', 'AdminCategoriesController');
Route::post('admin/categories/{user}', 'AdminCategoriesController@update');
Route::post('admin/categories/{user}/delete', 'AdminCategoriesController@destroy');


            //admin_medias route
Route::resource('admin/medias', 'AdminMediasController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
