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
                    <h4>{{$ad->category->name}}</h4>
                    <small>Posted at {{$ad->created_at}}
                            by {{$ad->user->name}}
                    </small>

                    <div class="row pull-right">
                            {!! Form::open(['action'=>['AdsController@destroy',$ad->id],'method'=>'POST' ] ) !!}
                            {{ Form::hidden('_method','DELETE') }}
                            {{Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])}}
                            {!!Form::close() !!}
                    </div>
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