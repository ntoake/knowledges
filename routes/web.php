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


// ユーザ登録
Route::get('admin/signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('admin/signup', 'Auth\RegisterController@register')->name('signup.post');


Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Auth\LoginController@login')->name('login.post');
Route::get('admin/logout', 'Auth\LoginController@logout')->name('logout.get');