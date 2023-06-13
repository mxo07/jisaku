@extends('layouts.app')
@section('content')

<label for='title'>名前</label>
        <input type='text' class='form-control' name='title' value=""/>
      <label for='text'>内容</label>
        <textarea class='form-control' name='text'></textarea>
      <label for='image'>アイコン</label>
        <input type='file' class='form-control' name='image' value="">
        <img src="{{ asset('storage/sample/'.$report['image'])}}">
      <label for='adress'>住所</label>
        <input type='text' class='form-control' name='adress' value="">

    <button type="submit" class="btn btn-primary">編集する</button>

  </fieldset>
</form>
@endsection