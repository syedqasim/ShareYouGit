@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                  
                    @php
                    var_dump($user);


            


                @endphp

<hr>
<hr>
<hr>
<hr>
@php


//var_dump($user->getId()) ; 
//var_dump($user->getNickname());
//var_dump($user->getName());
//var_dump($user->getEmail());
//var_dump($user->getAvatar());



@endphp       
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
