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

Route::get('/','PostsController@index', function () {
    return view('welcome');
});

// Route::resource('posts', 'PostsController');
Route::get('posts', 'PostsControllers@index')->name('posts.index'); // 一覧
Route::post('posts', 'PostsController@store')->name('posts.store'); // 保存
Route::get('posts/create', 'PostsController@create')->name('posts.create'); // 作成
Route::get('posts/{post_id}', 'PostsController@show')->name('posts.show'); // 表示
Route::get('posts/edit/{post_id}', 'PostsController@edit')->name('posts.edit'); // 編集
Route::put('posts/{post_id}', 'PostsController@update')->name('posts.update'); // 更新
Route::delete('posts/{post_id}', 'PostsController@destroy')->name('posts.destroy'); // 削除

// ユーザ登録
Route::get('signup','Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup','Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function(){
    Route::group(['prefix' => 'post/{id}'], function(){
        Route::post('favorite', 'FavoriteController@store')->name('favorite.favorite');
        Route::delete('unfavorite', 'FavoriteController@destroy')->name('favorite.unfavorite');
    });
});

Route::get('favorite', 'FavoriteController@index')->name('favorite.index');


Route::resource('users', 'UsersController');
Route::get('users/{user_id}', 'UsersController@show')->name('users.show');

Route::group(['prefix' => 'user/{id}'], function(){
    Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
});