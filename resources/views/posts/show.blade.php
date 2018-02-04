@extends('layouts.app')

@section('content')
<a class="btn btn-default" href="/ShareYou/public/posts">Back</a>
<h3>{{$post->title}}</h3>
<div>
    {!!$post->body!!}
</div>
<hr>
<small>Written on {{$post->created_at}}</small>
<hr>
<a class="btn btn-default" href="/ShareYou/public/posts/{{$post->id}}/edit">Edit</a>
{!! Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST' , 'class'=>'pull-right'] ) !!}
    {{ Form::hidden('_method','DELETE') }}
    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
{!!Form::close() !!}
@endsection