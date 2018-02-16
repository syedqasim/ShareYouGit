@extends('layouts.app')
@section('content')
<div class="row">
        <h3>Advertisements</h3>
</div>


@if(!Auth::guest())
<div class="row">
    <p><a class="btn btn-primary" href="/ads/create">Create Ad</a><p>
    </div>
@endif
    @if(count($ads)>0)

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Search Ads
            </div>
            <div class="panel-body">
                    {!! Form::open(['action' => 'AdsController@search', 'method'=>'GET' ,'enctype'=>'multipart/form-data' ]) !!}
                <div class="col-md-3">
                        <div class="form-group">
                                {{Form::label('title','Category')}}
                                {{Form::select('cat_id', $categoryList,null,['class'=>'form-control'])}}
                        </div>
                        {{Form::submit('Search',['class'=>'btn btn-primary'])}}
                </div>
                {!! Form::close() !!}
            </div
        </div>
    </div>

    <div class="row">
       @foreach($ads as $ad)
                <div class="col-md-4 col-sm-4">
                        <div class="well">
                        <h3><a href="/ads/{{$ad->id}}"> {{$ad->title}} </a></h3>
                        <h4>{{$ad->category->name}}</h4>
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