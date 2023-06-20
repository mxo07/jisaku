@extends('layouts.app')
@section('content')

<table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th scope='col'>タイトル</th>
                                            <th scope='col'>報告理由</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($reports))
                                    @foreach($reports as $report)
                                    <tr>
                                        <th scope='col'>{{ $report->title}}</th>
                                        <th scope='col'>{{ $report['reason']}}</th>
                                      </tr>
                                      @endforeach
                                      @endif

</tbody>
</table>
<a href="/"><div class="float-right"><button type="submit" class='btn btn-outline-dark'>戻る</button></div></a>

@endsection