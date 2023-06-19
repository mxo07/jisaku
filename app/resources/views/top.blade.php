
@extends('layouts.app')
@section('content')
@if(session('flash_msg'))
      <p class="text-danger">
        {{session('flash_msg')}}
      </p>
    @endif
<main class="py-4">

            <form>
            @csrf
            <div class="d-flex justify-content-center">
               <div class="col-md-4">
                <div class="card-header">
                  <div class='text-center'>日付検索</div>
                </div>
                <div class="card">
                  <div class="card-body mx-auto">
                    <input type="date" name="from" placeholder="from_date" value="{{$from}}">
                     
                    <button type='submit' class='btn btn-primary'>検索</button>
                  </div>
                </div>     
               </div>
               <div class="col-md-4">
               <div class="card-header">
                 <div class='text-center'>ワード検索</div>
                 </div>
                  <div class="card-body mx-auto">
                    <input type="search" placeholder="search" name="search" value="@if (isset($search)) {{ $search }} @endif">
  
                    <button type='submit' class='btn btn-primary'>検索</button>
                 </div>
                 </div>
            </div>
        </div>
        @if($user != null && $user['active'] == 1)
          <p>利用停止されています</p>
        @else
        <a href="{{ route('report.create')}}">
          <div class="text-right">
                                <button type='submit' class='btn btn-primary w-15 mt-3'>新規登録</button>
          </div>
        </a>
        @endif
        <div class="card-header">
          <div class="md-10">
              <div class='text-center'>報告一覧</div>
          </div>  
        </div>
       
        </form>
                        
                            <div class="card-body">
                            <div class="col-md-10">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th scope='col'></th>
                                            <th scope='col'>投稿者</th>
                                            <th scope='col'>タイトル</th>
                                            <th scope='col'>住所</th>
                                            <th scope='col'>投稿日</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                        
                                    @if(count($reports) > 0)
                                    @foreach($reports as $report)
                                    @if($report['hide_flg'] ==0)
                                    <tr>
                                        @if(isset($user['icon']))
                                        <th scope='col'><img class=""src="{{ asset('storage/icon_img/'.$user['icon'])}}"></th>
                                        @else
                                        <th scope='col'><img src="{{ asset('images/no_image_square.jpg')}}"></th>
                                        @endif
                                        <th scope='col'>
                                        <a href="{{ route('users.show',['user' => $report->user->id])}}">{{ $report->user->name }}</a>
                                        </th>
                                        <th scope='col'>
                                        <a href="{{ route('report.show',['report' => $report['id']])}}">{{ $report['title']}}</a></th>
                                        <th scope='col'>{{ $report['adress']}}</th>
                                        <th scope='col'>{{ $report['created_at']->format('Y/m/d')}}</th>
                                      </tr>
                                      @endif
                                      @endforeach
                                      @endif

</tbody>
</table>
</div>
</div>
</main>
<style>
  img{
    width: 100px;
  }
</style>
@endsection
