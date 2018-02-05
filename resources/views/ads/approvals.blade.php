@extends('layouts.app')

@section('content')
<h4>Ads Approvals</h4>

@if(count($ads)>0)
     
   @foreach($ads as $ad)
   <div class="well">
   <div class="row">
   
            <div class="col-md-4 col-sm-4">
                   
                    <h3><a href="/ads/{{$ad->id}}"> {{$ad->title}} </a></h3>
                    <small>Posted at {{$ad->created_at}}
                            by {{$ad->user->name}}
                    </small>
          
            </div>
            <div class="col-md-4 col-sm-4" style="padding:15px">
                    <div class="align-left col-md-3">
                <a class="btn btn-success" href="/ads/approve/{{$ad->id}}">Approve</a>
                    </div>
                <div class="align-left col-md-3">
                {!! Form::open(['action'=>['AdsController@reject',$ad->id],'method'=>'POST' ] ) !!}
                {{ Form::hidden('_method','DELETE') }}
                {{Form::submit('Reject',['class'=>'btn btn-danger'])}}
                {!!Form::close() !!}
                </div>
            </div>
        </div>
    </div>
   @endforeach

<div class="row">
   {{$ads->links()}}
</div>
@else
    <p>No pending approvals.</p>
@endif



@endsection