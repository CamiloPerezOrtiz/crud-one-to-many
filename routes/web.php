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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'UserController@list_addres')->name('list_addres');
Route::get('/register-addres', 'UserController@register_addres')->name('register_addres');
Route::post('/register-addres', 'UserController@register_addres_data')->name('register_addres_data');
Route::get('/list-user', 'UserController@list_user')->name('list_user');
Route::get('/register-user', 'UserController@register_user')->name('register_user');
Route::post('/register-user', 'UserController@register_user_data')->name('register_user_data');