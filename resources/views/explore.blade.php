@extends('main')

@section('content')

  <div class="page-header">
    <h1>Explore <small> All Posts</small></h1>
  </div>
  <div>
  <div class="row">
    <div class="col-md-6">
      @foreach($posts as $post)
      <div class="panel panel-default">
        <div class="panel-body">
          <h4>{{ $post->title }}</h4>
          <small><strong>Category: </strong>{{ $post->category->name }}</small><br >
          <small>{{ $post->created_at }}</p>
          <hr >
          <p>
            {{ strlen($post->content) > 100 ? substr($post->content, 0, 100).'...' :$post->content }}
          </p>
          <a class="btn btn-success" href="{{ route('post.view', $post['id'])}}">Learn More</a>
        </div>
      </div>
      @endforeach
    </div>
  </div>

@endSection