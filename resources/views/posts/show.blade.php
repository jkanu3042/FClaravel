@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            {{ $post->user->name }}
        </div>

        <img src="{{ Storage::url($post->img_path) }}">

        <div>
            {{$post->description}}
        </div>

        <div>
            @forelse($post->comments as $comment)
                <div>
                    <strong>{{ $comment->user->name }}</strong> {{ $comment->content }}
                </div>
            @empty
            @endforelse
        </div>


        <div>
            댓글 작성
            <form method="post" action="{{route('comments.store')}}">
                {!!  csrf_field() !!}
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <input type="text" name="content" class="form-control">
                <input type="submit" class="form-control">
            </form>

        </div>


    </div>

@endsection