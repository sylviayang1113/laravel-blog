@extends('main')

@section('content')
    
    <div class="jumbotron">
        <h1>Welcome to Blog!</h1>
        <hr>
        <p>Discover the newest posts made by amazing people!</p>
        <p><a class="btn btn-success btn-lg" href="{{ route('explore')}}" role="button">Explore Posts</a></p>
    </div>

@endsection