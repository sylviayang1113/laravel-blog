@extends('main')

@section('content')

<style>
    .error {
        border: 1px solid red;
    }
</style>

<div class="page-header">
    <h1>{{ $isNew ? 'Create' : 'Edit'}} Post</h1>
</div>

<div class="row">
    <div class="col-md-7">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif 

    @if($isNew)
        <form action="{{ route('post.createSubmit') }}" method="post">
    @else
        <form action="{{ route('post.update', ['post' => $post['id']]) }}" method="post">
    @endif

            <!-- title -->
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control @if($errors->has('title')) error @endIf" id="title" value="{{ $post->title }}">
            </div>
           <!-- category -->
            <div class="form-group">
                <label for="category">Category:</label>
                <div>
                    <select name="cat_id" type="text" class="form-control @if($errors->has('cat_id')) error @endIf">
                        <option></option>
                        <option value="1" name="1">congue</option>
                        <option value="2" name="2">ullamcorper</option>
                        <option value="3" name="3">semper</option>
                    </select>
		        </div>
            </div>
            <!-- content -->
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" cols="30" rows="10" class="form-control @if($errors->has('content')) error @endIf" id="content">{{ $post->content }}</textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="{{ $isNew ? 'Create' : 'Update'}}  Post">
                @if($isNew)
                <input type="reset" class="btn btn-danger" value="Clear Post">
                @endif
            </div>

        </form>
    </div>
</div>

@endSection