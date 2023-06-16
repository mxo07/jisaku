@extends('layouts.app')
@section('content')

<a href="/"><button type="submit" class='btn btn-danger'>戻る</button></a>
   
<div class="card-body">
                                <table class='report_table'>
                                    <div class="card-header">投稿一覧</div>
                                    <thead>
                                        <tr>
                                            <th scope='col'>タイトル</th>
                                            <th scope='col'>住所</th>
                                        </tr>
                                    </thead>
                                    <tbody>                
                                    <tr>
                                        <th scope='col'>
                                        <a href=""></a></th>
                                        <th scope='col'>ログインユーザー投稿一覧、コメント一覧。アイコン表示</th>
                                      </tr>
                              
                                     
                                    </tbody>
                          
        <div class="p-2 bd-hightlight">
                              <a href="{{ route('admin.index')}}">
                               <button class='btn btn-secondary'>管理者</button>
                              </a>
                          </div>
        </div>
      </div>
    </a>
 
@endsection