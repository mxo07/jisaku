@extends('layouts.app')
@section('content')

<main class="py-4">
  <div class="card my-3">
      <div class="card-body">
      <div class="p-2 bd-hightlight">
                              <a href="{{ route('report.edit',['report' => $report['id']])}}">
                               <button class='btn btn-secondary'>編集</button>
                              </a>
                          </div>
                          <div class="p-2 bd-hightlight">
                          <form action="{{ route('report.destroy',['report' => $report['id']]) }}" method="POST">
                          @method('DELETE')  
                          @csrf
                               <button type="submit" class='btn btn-warning'>削除</button>
                            </form>
                          </div>
                          <a href="/"><button type="submit" class='btn btn-danger'>戻る</button></a>
    <div class="article-control">
        
        <form action="{{ route('bookmark.store', $report) }}" method="post">
            @csrf
            <button>お気に入り登録</button>
        </form>
      
        <form action="{{ route('bookmark.destroy', $report) }}" method="post">
            @csrf
            @method('DELETE')
            <button>お気に入り解除</button>
        </form>
     
    </div>

                        
                          <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>タイトル</th>
                                            <th scope='col'>記事</th>
                                            <th scope='col'>住所</th>
                                            <th scope='col'>画像</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                       
                                        <th scope='col'>{{ $report['title']}}</th>
                                        <th scope='col'>{{ $report['text']}}</th>
                                        <th scope='col'>{{ $report['adress']}}</th>
                                        <th scope='col'>{{ $report['image']}}</th>
                                      </tr>
                                    </tbody>
                                 </table>
                             </div>
                          </div>
                          </div>

                          <div class="chat-container row justify-content-center">
    <div class="chat-area">
        <div class="card">
            <div class="card-header">Comment</div>
            <div class="card-body chat-card">
       
            </div>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('comment.store') }}">
    @csrf
<div class="comment-container row justify-content-center">
    <div class="input-group comment-area">
        <textarea class="form-control" placeholder="input massage" aria-label="With textarea"></textarea>
        <button type="input-group-prepend button" class="btn btn-outline-primary comment-btn">
            Submit
        </button>
    </div>
</div>
</form>
</main>

@endsection
