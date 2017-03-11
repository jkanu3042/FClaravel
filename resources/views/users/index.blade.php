@extends('layouts.app')

@section('content')
    <div class="container">
        @each('users.list-item',$users,'user','users.empty');
    </div>
@endsection
