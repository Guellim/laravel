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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
Route::middleware('admin')->group(function () {



}*/


Route::get('/users', 'UserController@index')->name('index');
Route::get('/users/getdata', 'UserController@getdata')->name('ajaxdata.getdata');
Route::post('/user/register', 'UserController@store')->name('user.register');
Route::post('/user/edit', 'UserController@update')->name('user.update');

/*Route::patch('/user/{id}/update', [
    'uses' => 'UserController@postUpdateTask',
    'as' => 'task.update'
]);*/

Route::delete('/user/{id}/destroy', [
    'uses' => 'UserController@destroy',
    'as' => 'delete'
]);