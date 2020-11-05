@extends('layout.app')
@section('content')
     @if($errors->any())
         <div class="alert alert-danger">
             @foreach($errors->all() as $error)
                {{$error}}<br>
             @endforeach
         </div>
     @endif
    {!! Form::open(['route'=>'posts.store','method'=>'post','files'=>true]); !!}
    <div class="form-group">
        {!! Form::label('title', 'عنوان:');!!}
        {!! Form::text('title',null, ['class'=>'form-control']);!!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'توضیحات:');!!}
        {!! Form::textarea('description',null, ['class'=>'form-control']);!!}
    </div>
     <div class="form-group">
         {!! Form::label('file', 'تصویر اصلی:');!!}
         {!! Form::file('file', ['class'=>'form-control']);!!}
     </div>
    <div class="form-group">
        {!! Form::submit('ذخیره',['class'=>'btn btn-primary']);!!}
    </div>
    {!! Form::close(); !!}







@endsection

{{--    <form action="/posts" method="POST">--}}
{{--        @csrf--}}

{{--        <input type="text" name="title" placeholder="عنوان مطلب">--}}
{{--        <br>--}}
{{--        <textarea type="text" name="description"></textarea>--}}
{{--        <br>--}}
{{--        <input type="submit" name="submit" value="ذخیره">--}}

{{--    </form>--}}




