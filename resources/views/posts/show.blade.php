@extends('layout.app')
@section('content')

    <h1><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></h1>
    <div class="mb-3">
        {{$post->body}}
    </div>
    <div class="image-container col-sm-2">
        <img src="{{$post->path}}"  alt="" >
    </div>

@endsection
