@extends('layout.app')
@section('content')
    <h1>ویرایش اطلاعات</h1>
@section('content')
@can('update',$post)
    {!! Form::model($post,['method'=>'PATCH','route'=>['posts.update',$post->id]]); !!}
    <div class="form-group">
        {!! Form::label('title', 'عنوان:');!!}
        {!! Form::text('title',$post->title, ['class'=>'form-control']);!!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'توضیحات:');!!}
        {!! Form::textarea('description',$post->body, ['class'=>'form-control']);!!}
    </div>
    <div class="form-group">
        {!! Form::submit('بروز رسانی',['class'=>'btn btn-warning']);!!}
    </div>
    {!! Form::close(); !!}

    {!! Form::model($post,['method'=>'DELETE','route'=>['posts.destroy',$post->id]]); !!}
    {!! Form::submit('حذف',['class'=>'btn btn-danger']);!!}
    {!! Form::close(); !!}


@endcan

@endsection














{{--    <form action="/posts/{{$post->id}}" method="post">--}}
{{--        <input type="hidden" name="_method" value="PATCH">--}}
{{--        @csrf--}}

{{--        <input type="text" name="title" placeholder="عنوان مطلب" value="{{$post->title}}">--}}
{{--        <br>--}}
{{--        <textarea type="text" name="description">{{$post->body}}</textarea>--}}
{{--        <br>--}}
{{--        <input type="submit" name="submit" value="update">--}}

{{--    </form>--}}
{{--    <form action="/posts/{{$post->id}}" method="post">--}}
{{--        <input type="hidden" name="_method" value="Delete">--}}
{{--        @csrf--}}
{{--        <br>--}}
{{--        <input type="submit" name="submit" value="delete">--}}

{{--    </form>--}}

@endsection
