<?php

use App\Http\Controller\DisplayController;
use App\Http\Controllers\BookmarkController;



// top画面
Route::get('/','DisplayController@index');
Route::get('reportdetail/{id}','DisplayController@show')->name('display.show');

Auth::routes();
Route::group(['middleware' => 'auth'],function(){

// 投稿操作
Route::resource('report','ReportController');

// コメント登録
Route::resource('comment','CommentController');
Route::get('/result/ajax', 'CommentController@getData');

// ブクマ登録
Route::post('/report_bookmark/{report}', 'BookmarkController@store')->name('bookmark.store');
Route::delete('/report_unbookmark/{report}', 'BookmarkController@destroy')->name('bookmark.destroy');

//違反報告
Route::resource('violation','ViolationController');
Route::get('violation/create/{violation}', 'ViolationController@create')->name('violation.create');
//ユーザーコントローラ
Route::resource('users','UserController');
Route::resource('admin','AdminController');

// 管理者機能
Route::get('/admin/hide/{user}','AdminController@hide')->name('admin.hide');
Route::get('/admin/delreport/{report}','AdminController@delreport')->name('admin.delreport');



Route::get('/home', 'HomeController@index')->name('home');
});