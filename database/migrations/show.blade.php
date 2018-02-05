@extends('layouts.app')

@section('content')
<a class="btn btn-default" href="/posts">Back</a>
<h3>{{$post->title}}</h3>
<img style="width:100px" src="/storage/cover_images/{{$post->cover_image}}">
<br><br>
<div>
    {!!$post->body!!}
</div>
<hr>
<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
<hr>
    @if(!Auth::guest())
        <a class="btn btn-default" href="/posts/{{$post->id}}/edit">Edit</a>
        {!! Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST' , 'class'=>'pull-right'] ) !!}
            {{ Form::hidden('_method','DELETE') }}
            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
        {!!Form::close() !!}
    @endif
@endsection