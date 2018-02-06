@extends('layouts.app')

@section('content')
    <h3>Create Ads</h3>
    {!! Form::open(['action' => 'AdsController@store', 'method'=>'POST' ,'enctype'=>'multipart/form-data' ]) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class'=>'form-control', 'placeholder'=>'Title' ])}}
        </div>
        <div class="form-group">
                {{Form::label('title','Category')}}
                {{Form::select('cat_id', $categoryList,null,['class'=>'form-control'])}}
        </div>

        
       
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}   


@endsection