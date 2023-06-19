@extends('layouts.app')
@section('content')

<div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th> @if(isset($user['icon']))
                                        <th scope='col'><div class="text-center"><img src="{{ asset('storage/icon_img/'.$user['icon'])}}"></div></th>
                                        @else
                                        <th scope='col'><div class="text-center"><img src="{{ asset('images/no_image_square.jpg')}}"></div></th>
                                        @endif
                    </th>
                    <th>{{ $user['name'] }}</th>
                    <th>{{ $user['profile'] }}</th>
                </tr>
            </thead>
        </table>
    </div>
    <a href="/"><button type="submit" class='btn btn-danger'>戻る</button></a>
    
<div class="card-body">
                                <table class='report_table'>
                                    <div class="card-header">投稿一覧</div>
                                    <div class="col-md-10">
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
    </a>
@endsection
<style>
  img{
    width: 100px;
  }
</style>