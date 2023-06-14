<?php

use App\Http\Controller\DisplayController;
use App\Http\Controllers\BookmarkController;



// top画面
Route::get('/','DisplayController@index');

Auth::routes();
Route::group(['middleware' => 'auth'],function(){

//ユーザーコントローラ
Route::resource('users','UserController');
Route::resource('admin','AdminController');
// 投稿操作
Route::resource('report','ReportController');

// コメント登録
Route::resource('comment','CommentController');
// ブクマ登録
Route::post('/report_bookmark/{report}', 'BookmarkController@store')->name('bookmark.store');
Route::delete('/report_unbookmark/{report}', 'BookmarkController@destroy')->name('bookmark.destroy');

//違反報告
Route::resource('violation','ViolationController');
Route::get('violation/create/{violation}', 'ViolationController@create')->name('violation.create');


Route::get('/home', 'HomeController@index')->name('home');
});