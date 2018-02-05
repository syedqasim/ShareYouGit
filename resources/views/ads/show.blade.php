@extends('layouts.app')

@section('content')
<a class="btn btn-default" href="/ads">Back</a>
<h3>{{$ad->title}}</h3>

<hr>
<small>Posted at {{$ad->created_at}} by {{$ad->user->name}}
   
</small>
@endsection