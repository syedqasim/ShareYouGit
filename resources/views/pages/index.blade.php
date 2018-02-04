@extends ('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>{{$title}}</h1>
    <p>In this system our aim is to facilitate the users to find rental places as well as to advertise and manage them. We are providing rental management platform which will be available over the web and IOS. The web application will be extensive and will entertain all users as it will include the management system however, our mobile apps will not contain access to the management system.</p>
    <p> 
        <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
        <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
      </p>
</div>
@endsection