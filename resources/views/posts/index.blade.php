@extends('layouts.app')

@section('content')
<a href="/ShareYou/public/posts/create" class="btn btn-default">Create Post</a>
    <h3>Posts</h3>
    @if(count($posts)>0)
       @foreach($posts as $post)
       <div class="well">

        <div class="row">
                <div class="col-md-4 col-sm-4">
                    <img style="width:100px" src="/ShareYou/public/storage/cover_images/{{$post->cover_image}}">
                </div>
                <div class="col-md-8 col-sm-8">
            
                        <h3><a href="/ShareYou/public/posts/{{$post->id}}"> {{$post->title}} </a></h3>
                        <small>Written on {{$post->created_at}}</small>
                 </div>
        </div>


       </div>
       @endforeach
       {{$posts->links()}}
    @else
        <p>No posts founds.</p>
    @endif

@endsection