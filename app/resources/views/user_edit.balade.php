@extends('layouts.app')
@section('content')

      <label for='title'>名前</label>
        <input type='text' class='form-control' name='title' value=""/>
      <label for='profile'>プロフィール</label>
        <input type='text' class='form-control' name='title' value=""/>
      <label for='image'>アイコン</label>
        <input type='file' class='form-control' name='image' value="">
        <img src="{{ asset('storage/icon/'.$user['icon'])}}">
      <label for='adress'>住所</label>
        <input type='text' class='form-control' name='adress' value="">

    <button type="submit" class="btn btn-primary">編集する</button>
    <a href="/"><button type="submit" class='btn btn-danger'>戻る</button></a>
  </fieldset>
</form>
@endsection