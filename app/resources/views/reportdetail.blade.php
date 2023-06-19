@extends('layouts.app')
@section('content')

<main class="py-4">
  <div class="card my-3">
      <div class="card-body">
        
          @if($user['active'] == 1)
          <p>利用停止されています</p>
        @else
        <div class='btn-toolbar' role="toolbar">
                              <a href="{{ route('report.edit',['report' => $report['id']])}}">
                               <button class='btn btn-outline-success'>編集</button>
                              </a>
                              <form action="{{ route('report.destroy',['report' => $report['id']]) }}" method="POST"
                                onSubmit="return checkDelete()">
                              @method('DELETE')  
                              @csrf
                               <button type="submit" class='btn btn-outline-secondary'>削除</button>
                            </form>
                            <a href="{{ route('violation.create',['violation' => $report['id']])}}">
                               <button class='btn btn-outline-warning'>報告する</button>
                            </a>

                            @if($bookmark_model->bookmark_exist(Auth::user()->id,$report->id))
                              <button class='btn btn-outline-danger'>
                                <a class="js-bookmark-toggle fav open" href="" data-reportsid="{{ $report->id }}"></a>
                              </button>
                           @else
                              <button class='btn btn-outline-danger'>
                                <a class="js-bookmark-toggle fav" href="" data-reportsid="{{ $report->id }}"></a>
                              </button>
                            @endif
                       @endif                          
                            </div>
                              <a href="/"><button type="submit" class='btn btn-outline-dark'>戻る</button></a>
</div>
</div>                 
                            <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-center h1">{{ $report['title']}}</div>

                                            <div class="row d-flex justify-content-between">
                                            <div class="text-left">
                                                投稿者/
                                            @if(isset($report->user->icon))
                                       <img src="{{ asset('storage/icon_img/'.$report->user->icon)}}" class="icon">
                                        @else
                                        <img src="{{ asset('images/no_image_square.jpg')}}" class="icon">
                                        @endif
                                        {{ $report->user->name}}</div>
                                        <div class="d-flex align-items-center">
                                            <div class="text-right">
                                                住所 / <span>{{ $report['adress']}}<span>
                                                投稿日 / {{$report['created_at']->format('Y/m/d')}}
                                            </div>
                                        </div>
                                        </div>
                                  <div class="text-center">
                                   @if(isset($report['image']))
                                        <img src="{{ asset('storage/sample/'.$report['image'])}}" class="img">
                                        @endif
                                  </div>
                                  <div class="border rounded W-75 ">
                                  <div class="text-break text-wrap lead ">
                                {{ $report['text']}}
</div>
</div>
                             </div>
                          </div>
                          </div>

    <div class="chat-container justify-content-center w-50">
    <div class="chat-area">
        <div class="card center-block">
            <div class="card-header">Comment</div>
            <div class="card-body chat-card">
            <div class="media">
        <div class="media-body comment-body">  
          @foreach($comments as $comment)
          <div class="row ">
              <span class="comment-body-user">{{ $comment->user->name }}</span>
              <span class="comment-body-time">{{ $comment['created_at']->format('Y/m/d') }}</span>
          </div>
            <span class="comment-body-content">
            {!! nl2br(e($comment['comment'])) !!}
            </span>
            @endforeach
        </div>
</div>
            </div>
        </div>
       </div>
</div>

@if($user['active'] ==1)
<p>利用停止されています</p>
@else
<form method="POST" action="{{ route('comment.store') }}">
    @csrf
      <div class="comment-container row justify-content-center w-50">
      <div class="input-group comment-area inputlg">
        <input type="hidden" value="{{ $report['id']}}" name="reports_id">
        <textarea class="form-control col-md-10" placeholder="input massage" aria-label="With textarea" name="comment"></textarea>
        </div>
        </div>
        </div>
    <button type="input-group-prepend button" class="btn btn-outline-primary comment-btn">
            Submit
        </button>
      
  

</form>
@endif

@section('js')

<script src="{{ asset('js/ajaxbookmark.js') }}"></script>
@endsection

<script>

    function checkDelete(){
        if(window.confirm('削除してよろしいですか？')){
            return ture;
        }else{
            return false;
        }
    }
</script>
@endsection
<style>
    .fav::before{
        content:'お気に入り登録';
    }
    .fav.open::before{
        content:'お気に入り解除';
    }

  .icon{
    width: 100px;
    height: 100px;
  }

  .img{
    width: 400px;
  }

    </style>
    <script>

    function checkDelete(){
        if(window.confirm('削除してよろしいですか？')){
            return ture;
        }else{
            return false;
        }
    }
</script>