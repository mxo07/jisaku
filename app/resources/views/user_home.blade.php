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
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><a href="{{ url('users/'.$user->id) }}">{{ $user->name }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

<a href="/articles/create" class="btn btn-primary">新規投稿</a>
@if(count($reports) > 0)
  @foreach($reports as $report)
    <a href="/reports/{{ $report['id'] }}">
      <div class="card my-3">
        <div class="card-body">
          <h5 class="card-title">{{ $report['title'] }}</h5>
          <p class="card-text">{{ $report['text'] }}</p>
        </div>
      </div>
    </a>
  @endforeach
@endif
@endsection