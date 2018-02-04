@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                        <tr>
                                <td>{{$post->title}}</td>
                                <td><a class="btn btn-default" href="/ShareYou/public/posts/{{$post->id}}/edit">Edit</a></td>
                                <td>

                                        {!! Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST' , 'class'=>'pull-right'] ) !!}
                                            {{ Form::hidden('_method','DELETE') }}
                                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                        {!!Form::close() !!}


                                </td>
                        </tr>
                        @endforeach()
                    </table>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
