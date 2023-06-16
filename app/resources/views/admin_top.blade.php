@extends('layouts.app')
@section('content')

<div class="card-body">
                                <table class='user_table'>
                                    <div class="card-header">ユーザーリスト</div>
                                    <thead>
                                        <tr>
                                            <th scope='col'>アイコン</th>
                                            <th scope='col'>ユーザー名</th>
                                            <th scope='col'>報告件数</th>
                                        </tr>
                                    </thead>
                                    <tbody>                
                                    <tr>
                                    @foreach($hides as $hide)
                                        <th scope='col'></th>
                                        <th scope='col'><a href="{{ route('users.show',['user' => $hide->id])}}">{{ $hide->name}}</a></th>
                                        <th scope='col'>{{ $hide->reports_count}}</th>
                                        </tr>
                              @endforeach
                              
                                     
                                    </tbody>
                                </table>
                                <table class='comment_table'>
                                <div class="card-header">投稿リスト</div>
                                    <thead>
                                        <tr>
                                            <th scope='col'>アイコン</th>
                                            <th scope='col'>ユーザー名</th>
                                            <th scope='col'>タイトル</th>
                                            <th scope='col'>報告件数</th>
                                        </tr>
                                    </thead>
                                    <tbody>                
                                    <tr>
                                        @foreach($violations as $violation)
                                        <th scope='col'></th>
                                        <th scope='col'>
                                            <a href="{{ route('users.show',['user' => $violation->user->id])}}">{{ $violation->user->name}}</a></th>
                                        <th scope='col'>
                                            <a href="{{ route('report.show',['report' => $violation->id])}}">{{ $violation->title}}</a>
                                        </th>
                                        <th scope='col'>
                                        <a href=""></a>{{ $violation->violation_count}}</th>
                                      
                                      
                                      </tr>
                              @endforeach
                                     
                                    </tbody>
                                </table>
                                <table class='bookmark_table'>
                                <div class="card-header">凍結ユーザー</div>
                                    <thead>
                                        <tr>
                                            <th scope='col'>投稿者名</th>
                                            <th scope='col'>アイコン</th>      
                                        </tr>
                                    </thead>
                                    <tbody>                
                                    <tr>
                                        <th scope='col'>
                                        <a href=""></a></th>
                                        <th scope='col'></th>
                                      </tr>
                                     
                                    </tbody>
                                </table>
                                <a href="/"><button type="submit" class='btn btn-danger'>戻る</button></a>
                          
@endsection