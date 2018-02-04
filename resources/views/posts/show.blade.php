@extends('layouts.app')

@section('content')
<a class="btn btn-default" href="/ShareYou/public/posts">Back</a>
<h3>{{$post->title}}</h3>
<div>
    {!!$post->body!!}
</div>
<hr>
<small>Written on {{$post->created_at}}</small>
@endsection