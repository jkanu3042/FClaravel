@extends('layouts.app')


@section('content')
  <div class="container">
    <h1>{{ $user->name }}</h1>
    <form action="{{route('users.destroy',['user'=>$user->id])}}" method="post">
      {{ csrf_field() }}
      {{ method_field('delete') }}
      <input type="submit" class="btn btn-default" value="탈퇴하기" />
    </form>
    사진 목록이 나올겁니다.
  </div>
@endsection
