@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="border p-4">
    <h1 class="h4 mb-4 font-weight-bold">プロフィール変更</h1>
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
<form action="{{route('users.update',['user' =>$user['id']])}}" enctype="multipart/form-data" method="PUT">
@method('PUT')
@csrf
      <label for='title'>名前</label>
        <input type='text' class='form-control' name='title' value="{{old('name',$user['name'])}}"/>
      <label for='profile'>プロフィール</label>
        <input type='text' class='form-control' name='prof' value="{{old('profile',$user['profile'])}}"/>
      <label for='image'>アイコン</label>
        <input type='file' class='form-control' name='icon' value="">
        <img class=""src="{{ asset('storage/icon_img/'.$user['icon'])}}">

    <button type="submit" class="btn btn-outline-success">編集する</button>
    <a href="/"><button type="submit" class='btn btn-outline-dark'>戻る</button></a>
  </fieldset>
</form>
@endsection