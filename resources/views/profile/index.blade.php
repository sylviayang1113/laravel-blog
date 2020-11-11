@extends('main')

@section('content')

  <div class="row">
    <div class="col-md-6">
      @if(session()->has('success_message'))
      <div class="alert alert-success">
        {{ session()->get('success_message')}}
      </div>
      @endif
      <div class="page-header">
        <h1>My Profile</h1>
      </div>
    </div>
    <div class="col-md-6">
      <a class="btn btn-success btn-lg pull-right" href="{{ route('post.create') }}">Create Post</a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      @foreach($posts as $post)
        <div class="panel panel-default">
          <div class="panel-body">
            {{ $post['title']}} <hr >
           <a class="btn btn-success" href="{{ route('post.view', $post['id'])}}">View Post</a>
           <a class="btn btn-warning" href="{{ route('post.edit', $post['id']) }}">Edit</a>
           <a class="btn btn-danger" href="{{ route('post.delete', $post['id']) }}">Delete</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endSection