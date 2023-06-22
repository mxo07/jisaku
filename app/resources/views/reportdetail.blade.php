@extends('layouts.app')
@section('content')
@if(session('flash_msg'))
      <p class="text-danger">
        {{session('flash_msg')}}
      </p>
    @endif
<main class="py-4">
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
                                  <div class="card body my-4 w-75 mx-auto">
                                  <div class="text-break text-wrap lead ">
                                {{ $report['text']}}
</div>
</div>

@if($user == null || $user['active'] == 1)
  <p>利用停止されています</p>
  @elseif($user['active'] == 0)
    @if($report->user->id == Auth::id())
      <div class='row justify-content-end'>
        <div class="mr-3">
          <a href="{{ route('report.edit',['report' => $report['id']])}}">
            <button class='btn btn-outline-success'>編集</button>
          </a>
        </div>
        <div class="mr-3">
          <form action="{{ route('report.destroy',['report' => $report['id']]) }}" method="POST" 
          onSubmit="return checkDelete()">
            @method('DELETE')  
              @csrf
            <button type="submit" class='btn btn-outline-secondary'>削除</button>
          </form>
        </div>
        </div>
    @else    
        <div class='row justify-content-end'>
          <div class="mr-3">
            <a href="{{ route('violation.create',['violation' => $report['id']])}}">
              <button class='btn btn-outline-warning'>報告する</button>
            </a>
          </div>
          <div class="mr-3">
            @if($bookmark_model->bookmark_exist(Auth::user()->id,$report->id))
              <button class='btn btn-outline-danger'>
                <a class="js-bookmark-toggle fav open" href="" data-reportsid="{{ $report->id }}"></a>
                  </button>
              @else
                <button class='btn btn-outline-danger'>
                  <a class="js-bookmark-toggle fav" href="" data-reportsid="{{ $report->id }}"></a>
                </button>
              @endif
          </div>
        </div>
        <div class="text-left">
              <a href="/"><button type="submit" class='btn btn-outline-dark'>戻る</button></a>
            </div>
  @endif       
@endif                          
            

  <div class="chat-container justify-content-center w-50 mx-auto">
    <div class="chat-area">
        <div class="card">
            <div class="card-header">Comment</div>
            <div class="card-body chat-card">
            <div class="media ">
        <div class="media-body comment-body"> 
        @if(isset($report->user->id)) 
          @foreach($comments as $comment)
          <div class="row ">
              <span class="comment-body-user">{{ $comment->user->name }}</span>
              <span class="comment-body-time">{{ $comment['created_at']->format('Y/m/d') }}</span>
          </div>
            <span class="comment-body-content">
            {!! nl2br(e($comment['comment'])) !!}
            </span>
            @endforeach
            @endif
      </div>
</div>
            </div>
        </div>
       </div>
</div>

@if($user['active'] ==1)
<p>利用停止されています</p>
@elseif($user == null || $user['role'] == 0 && $user['active'] == 0)
<form method="POST" action="{{ route('comment.store') }}">
    @csrf
      <div class="comment-container row justify-content-center w-50 mx-auto p-2">
        <div class="input-group comment-area inputlg">
          <input type="hidden" value="{{ $report['id']}}" name="reports_id">
            <textarea class="form-control col-md-10" placeholder="input massage" aria-label="With textarea" name="comment"></textarea>
        </div>
     
      <div class="p-2 mr-10">
        <button type="input-group-prepend button" class="btn btn-outline-info comment-btn ">
            コメントする
        </button>
      </div>
      </div>
</div>
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
        color:pink;
    }
    .fav.open::before{
        content:'お気に入り解除';
        color:pink;
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