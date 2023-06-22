@extends('layouts.app')
@section('content')

<div class="block mx-auto">
                   @if(isset($user['icon']))
                   <img class=""src="{{ asset('storage/icon_img/'.$user['icon'])}}">
                  @else
                   <img src="{{ asset('images/no_image_square.jpg')}}">
                  @endif
                    <div class="h3">{{ $user['name'] }}</div>
                    <div class="card body my-4 w-75 mx-auto">
                    <div class="h5">{{ $user['profile'] }}</div>
</div>
</div>
    </div>
    <a href="/">
        <div class="text-right"><button type="submit" class='btn btn-outline-dark'>戻る</button></div>
    </a>
    
<div class="card-body mx-auto" style="width: 900px;">
                                <table class='report_table text-center'>
                                    <div class="card-header">投稿一覧</div>
                                    
                                    <thead>
                                        <tr>
                                            <th scope='col'>タイトル</th>
                                            <th scope='col'>住所</th>
                                            <th scope='col'>投稿日</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @foreach($reports as $report)              
                                    <tr>
                                        <th scope='col'>
                                        <a href="{{ route('report.show',['report' => $report->id])}}">{{ $report->title}} </a></th>
                                        <th scope='col'>{{ $report->adress}} </th>
                                        <th scope='col'>{{  $report->created_at->format('Y/m/d')}} </th>
                                      </tr>
                                     @endforeach
                                    </tbody>
                           </div>
</div>
        </div>
      </div>
    </a>
@endsection
<style>
  img{
    width: 100px;
  }
</style>