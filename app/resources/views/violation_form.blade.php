@extends('layouts.app')
@section('content')

<div class="container">
<form action="{{route('violation.store',['violation' => $report])}}"  enctype="multipart/form-data" method="POST">
  @csrf
        <h1 class="text-center mt-2 mb-5">違反報告</h1>
        <div class="container">
          <label for='text'>報告理由</label>
          <input type='hidden' value='{{$report}}' name='report_id'>
          <textarea class='form-control' name='reason'>{{old('reason')}}</textarea>         

</div>
   <div class='btn-toolbar p-2' role="toolbar">
            <button type="submit" class="btn btn-outline-info mr-3">送信する</button>
</form>
      <a href="/">
        <button type='submit' class='btn  btn-outline-dark'>戻る</button>
      </a>
</div>

</div>
@endsection