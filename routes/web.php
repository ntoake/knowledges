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

//フロント
//top
Route::get('/','Front\frontSharepostsController@index')->name('front');

Route::get('/sharepost/{sharepost}','Front\frontSharepostsController@show')->name('front.show');



/*Route::get('/', function () {
    return view('welcome');
});*/


// ユーザ登録
Route::get('admin/signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('admin/signup', 'Auth\RegisterController@register')->name('signup.post');

//ログイン
Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Auth\LoginController@login')->name('login.post');
Route::get('admin/logout', 'Auth\LoginController@logout')->name('logout.get');


//管理
//top
Route::get('admin','Admin\SharepostsController@index')->name('admin');

//管理ユーザ
Route::group(['middleware' => ['auth']], function () {
    Route::resource('admin/users', 'Admin\UsersController', ['only' => ['show', 'edit', 'update', 'destroy']]);
    
    Route::resource('admin/shareposts', 'Admin\SharepostsController');
    
    Route::resource('admin/tags', 'Admin\TagsController');
});


