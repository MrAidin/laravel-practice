@extends('layout.app')
@section('content')
    <ul>
        @foreach($posts as $post)
            <div class="image-container col-sm-2">
                <img src="{{$post->path}}"  alt="" width="100px" height="100px">
            </div>
            <li><a href="{{route('posts.show',$post->id)}}">{{$post->title}}</a></li>
            <span>{{$post->user->name}}</span>
        @endforeach
    </ul>

@endsection
