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
                          <a href="{{ route('report.destroy',['report' => $report['id']])}}">
                               @csrf
                               <button class='btn btn-warning'>論理削除</button>
                           </a>
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
</main>

@endsection
