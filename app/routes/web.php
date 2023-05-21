<?php

use App\Http\Controller\DisplayController;
use App\Http\Controllers\RegistrationController;

// top画面
Route::get('/','DisplayController@index');

// 投稿操作
Route::resource('report','ReportController');

// コメント登録
Route::post('/report/{commment_id}/comments','RegistrationController');
// ブクマ登録

