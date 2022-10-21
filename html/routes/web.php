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

Route::get('/', 'WebController@index');

// ↓カートに入れたあとの表示画面ルート
Route::get('users/carts', 'CartController@index')->name('carts.index');
// ↓カートに入れたあとの機能ルート
Route::post('users/carts', 'CartController@store')->name('carts.store');
// ↓カートに入れたあとの非活性ルート？？練習用だから購入したら削除される機能？
Route::delete('users/carts', 'CartController@destroy')->name('carts.destroy');

// ↓ユーザー登録編集ルート
Route::get('users/mypage', 'UserController@mypage')->name('mypage');
Route::get('users/mypage/edit', 'UserController@edit')->name('mypage.edit');
Route::get('users/mypage/address/edit', 'UserController@edit_address')->name('mypage.edit_address');
Route::put('users/mypage', 'UserController@update')->name('mypage.update');
// ↑ユーザー登録編集ルート

// ↓お気入り表示画面ルート
Route::get('users/mypage/favorite', 'UserController@favorite')->name('mypage.favorite');


// ↓パスワード編集ルート
Route::get('users/mypage/password/edit', 'UserController@edit_password')->name('mypage.edit_password');
Route::put('users/mypage/password', 'UserController@update_password')->name('mypage.update_password');
// ↑パスワード編集ルート

// ↓レビュー送信ルート(画面は商品画面productの方)
Route::post('products/{product}/reviews', 'ReviewController@store');

// ↓お気に入り画面ルート
Route::get('products/{product}/favorite', 'ProductController@favorite')->name('products.favorite');

// ↓商品登録や画面表示ルート(まとめている)
Route::resource('products', 'ProductController');

// ログイン機能へのルート
Auth::routes(['verify' => true]);

// ↓ホーム画面ルート
Route::get('/home', 'HomeController@index')->name('home');
