@extends('layouts.app')
@section('content')

<div class="block mx-auto">
                   @if(isset($user['icon']))
                   <img class=""src="{{ asset('storage/icon_img/'.$user['icon'])}}">
                  @else
                   <img src="{{ asset('images/no_image_square.jpg')}}">
                  @endif
                    <div class="h3">{{ Auth::user()->name }}</div>
                    <div class="card body my-4 w-75 mx-auto">
                    <div class="h5">{{ Auth::user()->profile }}
</div>
</div>

<div class="d-flex justify-content-between">
  <div class="">
    <a href="{{ route('report.create')}}" class="btn btn-outline-primary">新規投稿</a>
    <a href="{{ route('users.edit',['user' => $user['id']])}}" class="btn btn-outline-success">プロフィール変更</a>
  </div>
  <div class="">
    <a href="/"><button type="submit" class='btn btn-outline-dark'>戻る</button></a>
</div>
</div>
   
<div class="card-body">
<div class="d-flex justify-content-center">
                            <div class="col-md-3 text-center">
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
                                    @if(!empty($reports) && isset($report->user->id))  
                                    @foreach($reports as $report)             
                                      <tr>
                                        <th scope='col'>
                                          <a href="{{ route('report.show',['report' => $report->id])}}">{{ $report->title}}</a>
                                        </th>
                                        <th scope='col'>{{ $report->adress}}</th>
                                        <th scope='col'>{{ $report->created_at->format('Y/m/d')}}</th>
                                        <th scope='col'>
                                          <a href="{{ route('report.edit',['report' => $report->id])}}" class="btn btn-outline-success">編集</a>
                                        </th>
                                        <th scope='col'>
                                        <a href="{{ route('report.destroy',['report' => $report->id])}}" class="btn btn-outline-secondary">削除</a>
                                        </th>
                                      </tr>
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
</div>
<div class="col-md-3 text-center">
                                <table class='comment_table'>
                                <div class="card-header">コメント一覧</div>
                                    <thead>
                                        <tr>
                                            <th scope='col'>タイトル</th>
                                            <th scope='col'>コメント</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($comments) && isset($comment->user->id))
                                    @foreach($comments as $comment)    
                                    <tr>
                                        <th scope='col'>
                                        <a href="{{ route('report.show',['report' => $report->id])}}">{{ $comment->title}}</a>
                                        </th>
                                        <th scope='col'>{!! nl2br(e($comment->comment)) !!}</th>
                                      </tr>
                                 @endforeach
                                    @endif
                                    </tbody>
                                </table>
</div>
<div class="col-md-3 text-center">
                                <table class='bookmark_table'>
                                <div class="card-header">ブックマーク一覧</div>
                                    <thead>
                                        <tr>                                           
                                            <th scope='col'>タイトル</th>     
                                            <th scope='col'>投稿者名</th> 
                                        </tr>
                                    </thead>

                                    <tbody>    
                                    @if(count($bookmarks) > 0 && isset($report->user->id))
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
</div>
</div>

                          </div>
        </div>
      </div>
    </a>
  <style>
  img{
    width: 100px;
  }
</style>
@endsection