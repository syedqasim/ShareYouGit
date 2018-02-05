@extends('layouts.app')

@section('content')
<h4>Test</h4>



@foreach($roles as $role)
    {{$role}}
@endforeach
@endsection
