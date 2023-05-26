<form action="/reports/{{$report['id']}}" enctype="multipart/form-data" method="POST">
@method('PUT')
  @csrf
  <fieldset class="mb-4">

      <label for='title'>タイトル</label>
        <input type='text' class='form-control' name='title' value="{{old('title',$report['title'])}}"/>
      <label for='text'>内容</label>
        <textarea class='form-control' name='text'>{{old('text',$report['text'])}}</textarea>
      <label for='image'>画像</label>
        <input type='file' class='form-control' name='image' value="{{old('image',$report['image'])}}">
      <label for='adress'>住所</label>
        <input type='text' class='form-control' name='adress' value="{{old('adress',$report['adress'])}}">

    <button type="submit" class="btn btn-primary">編集する</button>

  </fieldset>
</form>