@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="border p-4">
    <h1 class="h4 mb-4 font-weight-bold">新規作成</h1>
<div class='panel-body'>
  @if($errors->any())
  <div class='alert alert-danger'>
    <ul>
      @foreach($errors->all() as $massage)
      <li>{{ $massage }}</li>
      @endforeach
    </ul>
  </div>
  @endif
</div>

<form action="{{route('report.store')}}" enctype="multipart/form-data" method="POST">
  @csrf
  <fieldset class="mb-4">

      <label for='title'>タイトル</label>
        <input type='text' class='form-control' name='title' value="{{old('title')}}">
      <label for='text'>本文</label>
        <textarea class='form-control' name='text'>{{old('text')}}</textarea>
      <label for='image'>画像</label>
        <input type='file' class='form-control' name='image' value="{{old('image')}}">
      <label for='adress'>住所</label>
        <input type='text' class='form-control' name='adress' value="{{old('adress')}}">

    <button type="submit" class="btn btn-primary">
      投稿する
    </button>
    <a href="/"><button type="submit" class='btn btn-danger'>戻る</button></a>
  </fieldset>
</form>
</div>
</div>
@endsection