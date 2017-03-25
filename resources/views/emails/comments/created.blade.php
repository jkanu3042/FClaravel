<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
</head>
<body>
<div>
    <a href="{{ config('app.url') }}:8000/posts/{{ $postId }}">
        {{ $postAuthorName }}님의 포스트
    </a>
    에 댓글이 추가되었습니다.
</div>
<div>
    <strong>{{ $commentAuthorName }}</strong> {{ $comment->content }}
</div>
</body>
</html>