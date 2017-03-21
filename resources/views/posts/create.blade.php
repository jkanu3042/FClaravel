@extends('layouts.app')

@section('content')
  <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
     {!! csrf_field() !!}
   <h2>글 올리기</h2>

   <div class="container">
     @if(session('flash_message'))
      <div class="alert alert-danger">
        {{session('flash_message')}}
      </div>
     @endif
   </div>

   <div class="form-group">
       <label for="imgInput">이미지</label>
       <input type="file" id="imgInput" name="img">
       @if($errors->has('img'))
       <p class="help-block">{{ $errors->first('img') }}</p>
       @endif
   </div>
   <div class="form-group">
       <label for="descriptionInput">설명</label>
       <textarea id="descriptionInput" class="form-control" name="description">{{ old('description') }}</textarea>
       @if($errors->has('description'))
       <p class="help-block">{{ $errors->first('description') }}</p>
       @endif

       <input type="text" class="form-control" name="tags"  placeholder="태그를 입력해주세요. 여러개인 경우 ,로 연결해주세요.">
       <button type="submit" class="btn btn-default">올리기</button>
   </div>
  </form>
@endsection
