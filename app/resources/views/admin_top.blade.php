@extends('layouts.app')
@section('content')
<div class="card-body">
      <div class="p-2 bd-hightlight">
                              <a href="">
                               <button class='btn btn-secondary'>ユーザー一覧</button>
                              </a>
                          </div>
                          <div class="p-2 bd-hightlight">
                              <a href="">
                               <button class='btn btn-secondary'>違反報告</button>
                              </a>
                          </div>
                          <div class="p-2 bd-hightlight">
                              <a href="">
                               <button class='btn btn-secondary'>投稿一覧</button>
                              </a>
                          </div>
                          {{dd($violations)}}
@endsection