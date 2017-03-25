@extends('layouts.app')

@section('content')
<div class="container">
    @forelse($posts as $post)
       <div>
           {{ $post->user->name }}
       </div>
        <div>
            <a href="{{ route('posts.show',['id'=>$post->id]) }}">
                <img src="{{ Storage::url($post->img_path) }}">
            </a>
        </div>
        <div>
            {{ $post->description }}
        </div>
        <div>
            댓글 {{ $post->comments_count or 0 }}
        </div>
        @empty
    @endforelse
</div>

@if($posts->count())
    <div class="text-center">
        {!! $posts->render() !!}
    </div>
@endif
@endsection
