<?php

use App\Http\Controller\DisplayController;
use App\Http\Controllers\RegistrationController;



// top画面
Route::get('/','DisplayController@index');

Auth::routes();
Route::group(['middleware' => 'auth'],function(){

//ユーザーコントローラ
Route::resource('users','UserController');
// 投稿操作
Route::resource('report','ReportController');

// コメント登録
// Route::post('/report/{commment_id}/comments','RegistrationController');
// ブクマ登録




Route::get('/home', 'HomeController@index')->name('home');
});