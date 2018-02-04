@extends('layouts.app')

@section('content')
    <h3>Posts</h3>
    @if(count($posts)>0)
       @foreach($posts as $post)
       <div class="well">
            <h3><a href="/ShareYou/public/posts/{{$post->id}}"> {{$post->title}} </a></h3>
            <small>Written on {{$post->created_at}}</small>
       </div>
       @endforeach
       {{$posts->links()}}
    @else
        <p>No posts founds.</p>
    @endif

@endsection