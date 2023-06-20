@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="border p-4">
    <h1 class="h4 mb-4 font-weight-bold">編集</h1>
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
<form action="{{route('report.update',['report' => $report['id']])}}" enctype="multipart/form-data" method="POST">
@method('PUT')
  @csrf
  <fieldset class="mb-4">

      <label for='title'>タイトル</label>
        <input type='text' class='form-control' name='title' value="{{old('title',$report['title'])}}"/>
      <label for='text'>本文</label>
        <textarea class='form-control' name='text'>{{old('text',$report['text'])}}</textarea>
      <label for='image'>画像</label>
        <input type='file' class='form-control' name='image' value="">
        <div class="text-center">
        @if(isset($report['image']))
        <img src="{{ asset('storage/sample/'.$report['image'])}}">
        @endif
        </div>
      <label for='adress'>住所</label>
        <input type='text' class='form-control' name='adress' value="{{old('adress',$report['adress'])}}">
<div class="p-2">
    <button type="submit" class="btn btn-outline-success">編集する</button>
    <a href="/"><button type="submit" class='btn btn-outline-dark'>戻る</button></a>
</div>
  </fieldset>
</form>
@endsection