@extends('main')

@section('content')

<!-- post zone -->
<div class="page-header">
    <h1>{{ $post->title}}</h1>
    <p><strong>Author: </strong>{{ $post->user->name}}</p>
    <p><strong>Category: </strong>{{ $post->category->name}}</p>
    <small>{{ $post->created_at}}</small>
</div>

<div class="row">
  <div class="col-md-7">

  @if(session()->has('success_message'))
    <div class="alert alert-success">
      {{ session()->get('success_message')}}
    </div>
  @endif
    <p>
      {{ $post->content}}
    </p>
    <a class="btn btn-primary" href="#">Share to Facebook</a>
    <a class="btn btn-success" href="#">Share to Twitter</a>
  </div>
</div>

<br>

<!-- add comment zone -->
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Leave a Comment</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="{{ route('post.comments', $post->id) }}">
      @csrf
      <div class="form-group">
          <input type="text" name="comment" 
                  class="form-control @if($errors->has('comment')) error @endIf"
                  placeholder="Your comment..."/>
          <input type="hidden" name="post_id" value="{{ $post->id }}" />
      </div>
      <div class="form-group">
          <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Add Comment" />
      </div>
    </form>
  </div>
</div>
<!-- comment zone -->
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Comments</h3>
  </div>
  
    <ul class="list-group">
      @foreach($post->comments as $comment)
      <li class="list-group-item">
         <h5>{{ $post->user->name}}</h5>
         <small>{{ $post->created_at}}</small><br><br>
          <div>
          {{ $comment->comment }}
     
          </div>
        
      </li>
      @endforeach
    </ul>
</div>
@endSection