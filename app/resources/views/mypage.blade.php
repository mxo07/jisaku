@extends('layouts.app')
@section('content')

<div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                  
                    <th>{{ Auth::user()->name }}</th>
                    <th>{{ Auth::user()->profile }}</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
    </div>
</div>


<a href="{{ route('report.create')}}" class="btn btn-primary">新規投稿</a>
<a href="/"><button type="submit" class='btn btn-danger'>戻る</button></a>
   
<div class="card-body">
                                <table class='report_table'>
                                    <div class="card-header">投稿一覧</div>
                                    <thead>
                                        <tr>
                                            <th scope='col'>タイトル</th>
                                            <th scope='col'>住所</th>
                                            <th scope='col'>日付</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    @if(!empty($reports))  
                                    @foreach($reports as $report)             
                                      <tr>
                                        <th scope='col'>
                                          <a href="{{ route('report.show',['report' => $report->id])}}">{{ $report->title}}</a>
                                        </th>
                                        <th scope='col'>{{ $report->adress}}</th>
                                        <th scope='col'>{{ $report->created_at->format('Y/m/d')}}</th>
                                      </tr>
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <table class='comment_table'>
                                <div class="card-header">コメント一覧</div>
                                    <thead>
                                        <tr>
                                            <th scope='col'>タイトル</th>
                                            <th scope='col'>投稿者</th>
                                            <th scope='col'>コメント</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($comments))
                                    @foreach($comments as $comment)                  
                                    <tr>
                                        <th scope='col'>
                                          <a href="{{ route('report.show',['report' => $comment->id])}}">{{ $comment->title}}</a>
                                        </th>
                                        <th scope='col'>
                                          <a href="{{ route('users.show',['user' => $comment->id])}}">{{ $comment->name}}</a>
                                        </th>
                                        <th scope='col'>{{ $comment->comment}} </th>
                                      </tr>
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <table class='bookmark_table'>
                                <div class="card-header">ブックマーク一覧</div>
                                    <thead>
                                        <tr>                                           
                                            <th scope='col'>タイトル</th>     
                                            <th scope='col'>投稿者名</th> 
                                        </tr>
                                    </thead>

                                    <tbody>    
                                    @if(count($bookmarks) > 0)
                                    @foreach($bookmarks as $bookmark) 
                                    <tr>
                                        <th scope='col'>
                                          <a href="{{ route('report.show',['report' => $bookmark->id])}}">{{ $bookmark->title}}</a>
                                        </th>
                                        <th scope='col'>
                                          <a href="{{ route('users.show',['user' => $bookmark->id])}}">{{ $bookmark->name}}</a></th>
                                      </tr>
                                    @endforeach
                                    @endif
                                     
                                    </tbody>
                                </table>
        <div class="p-2 bd-hightlight">
                              <a href="{{ route('admin.index')}}">
                               <button class='btn btn-secondary'>管理者</button>
                              </a>
                          </div>
        </div>
      </div>
    </a>
 
@endsection