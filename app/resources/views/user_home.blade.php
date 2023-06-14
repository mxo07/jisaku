@extends('layouts.app')
@section('content')

<div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Name') }}</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
    </div>
</div>


<a href="{{ route('report.create')}}" class="btn btn-primary">新規投稿</a>

   
      <div class="card my-3">
      <table class="table table-striped">
            <thead>
                <tr>
                    <ths cope='col'>タイトル</th>
                </tr>
            </thead>
            <tbody>
                
               
            </tbody>
        <div class="card-body">
        <div class="p-2 bd-hightlight">
                              <a href="{{ route('admin.index')}}">
                               <button class='btn btn-secondary'>管理者</button>
                              </a>
                          </div>
        </div>
      </div>
    </a>
 
@endsection