@extends('layouts.app')


@section('content')
  <div class="container">
    <h1>{{ $user->name }}</h1>
    @can('delete',$user)
    <form action="{{route('users.destroy',['user'=>$user->id])}}" method="post">
      {{ csrf_field() }}
      {{ method_field('delete') }}
      <input type="submit" class="btn btn-default" value="탈퇴하기" />
    </form>
    @endcan

    <div>
      @forelse($user->posts as $post)
        <div>
          <a href="{{ route('posts.show', ['post' => $post->id]) }}">
            <img src="{{ Storage::url($post->img_path) }}">
          </a>
        </div>
        <div>댓글수 : {{ $post->comments_count }}</div>
      @empty
        사진이 없습니다.
      @endforelse
      </div>

</div>

@endsection
