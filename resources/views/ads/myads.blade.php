@extends('layouts.app')

@section('content')

<p><a class="btn btn-primary" href="/ads/create">Create Ad</a><p>

<h3>My Ads</h3>

@if(count($ads)>0)
<div class="row">
   @foreach($ads as $ad)
            <div class="col-md-4 col-sm-4">
                    <div class="well">
                    <h3><a href="/ads/{{$ad->id}}"> {{$ad->title}} </a></h3>
                    <small>Posted at {{$ad->created_at}}
                            by {{$ad->user->name}}
                    </small>
             </div>
            </div>
   @endforeach
</div>
<div class="row">
   {{$ads->links()}}
</div>
@else
    <p>No ads founds.</p>
@endif



@endsection