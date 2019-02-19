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
Route::resource('admin/users', 'AdminUsersController');
Route::post('admin/users/{user}', 'AdminUsersController@update');
Route::post('admin/users/{user}', 'AdminUsersController@dropzone')->name('admin.dropzone');

Route::get('admin/users/{user}/edit', 'AdminUsersController@edit')->name('admin.users.edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
