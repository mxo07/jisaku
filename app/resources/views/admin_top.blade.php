@extends('layouts.app')
@section('content')

<main>
<div class="d-flex justify-content-center">
                             <div class="col-md-4">
                                <table class='user_table'>
                                    <div class="card-header">ユーザーリスト</div>
                                    <thead>
                                        <tr> <div class="center-block">
                                            <th scope='col'><div class="text-center"></div></th>
                                            <th scope='col'><div class="text-center">ユーザー名</div></th>
                                            <th scope='col'><div class="text-center">件数</div></th>
                                            <th scope='col'><div class="text-center"></div></th>
                                            <div>
                                        </tr>
                                    </thead>
                                    <tbody>                
                                    <tr>
                                    @foreach($hides as $hide)

                                    @if(isset($user['icon']))
                                        <th scope='col'><div class="text-center"><img src="{{ asset('storage/icon_img/'.$user['icon'])}}"></div></th>
                                        @else
                                        <th scope='col'><div class="text-center"><img src="{{ asset('images/no_image_square.jpg')}}"></div></th>
                                        @endif
                                        <th scope='col'><a href="{{ route('users.show',['user' => $hide->id])}}"><div class="text-center">{{ $hide->name}}</div></a></th>
                                        <th scope='col'><div class="text-center">{{ $hide->reports_count}}</div></th>
                                        <th scope='col'>
                                          <a href="{{ route('admin.hide',['user' => $hide['id']])}}">   
                                                @csrf
                                                <div class="text-center">
                                                    <button type="submit" class='btn btn-danger'>利用停止</button></div>
                                        </th>
</a>
                                        </tr>
                                    @endforeach                                   
                                    </tbody>
                                </table>
                                </div>
                                <div class="col-md-4">
                                <table class='comment_table'>
                                <div class="card-header">投稿リスト</div>
                                    <thead>
                                        <tr>
                                            <th scope='col'></th>
                                            <th scope='col'><div class="text-center">ユーザー名</div></th>
                                            <th scope='col'><div class="text-center">タイトル</div></th>
                                            <th scope='col'><div class="text-center">報告件数</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>                
                                    <tr>
                                        @foreach($violations as $violation)
                                        @if(isset($user['icon']))
                                        <th scope='col'><div class="text-center"><img src="{{ asset('storage/icon_img/'.$user['icon'])}}"></div></th>
                                        @else
                                        <th scope='col'><div class="text-center"><img src="{{ asset('images/no_image_square.jpg')}}"></div></th>
                                        @endif
                                        <th scope='col'>
                                            <a href="{{ route('users.show',['user' => $violation->user->id])}}"><div class="text-center">{{ $violation->user->name}}<div></a></th>
                                        <th scope='col'>
                                            <a href="{{ route('report.show',['report' => $violation->id])}}"><div class="text-center">{{ $violation->title}}</div></a>
                                        </th>
                                        <th scope='col'>
                                            <div class="text-center">{{ $violation->violation_count}}</div>
                                        </th>
                                        <th scope='col'>
                                            <a href="{{ route('admin.delreport',['report' =>$violation['id']])}}">
                                            @csrf
                                            <button type="submit" class='btn btn-danger'>非公開</button></a>
                                        </th>
                                      </tr>
                              @endforeach                                   
                                    </tbody>
                                    </table>
                                    </div>
</div>
                                <a href="/"><div class="float-right"><button type="submit" class='btn btn-danger'>戻る</button></div></a>
</main>


@endsection
<style>
  img{
    width: 100px;
  }
</style>