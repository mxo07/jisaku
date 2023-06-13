
@extends('layouts.app')
@section('content')
<main class="py-4">
<div class="card-header">
                            <div class='text-center'>報告一覧</div>
                              <a href="{{ route('report.create')}}">
                                <button type='submit' class='btn btn-primary w-25 mt-3'>新規登録</button>
</a>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>投稿者</th>
                                            <th scope='col'>タイトル</th>
                                            <th scope='col'>住所</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  
                                    @if(count($reports) > 0)
                                    @foreach($reports as $report)
    
                                    <tr>
                                        <th scope='col'>
                                        <a href=" ">{{ $report['name'] }}</a>
                                        </th>
                                        <th scope='col'>
                                        <a href="{{ route('report.show',['report' => $report['id']])}}">{{ $report['title']}}</a></th>
                                        <th scope='col'>{{ $report['adress']}}</th>
                                      </tr>
                                      @endforeach
                                      @endif
</tbody>
</div>
</main>
@endsection