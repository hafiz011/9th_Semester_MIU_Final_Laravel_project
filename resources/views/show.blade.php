@extends('layout.master')

@section('content')


@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="card mt-4">
    <div class="card-header">
        <h3>{{ $post->title }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="Post Image">
            </div>
            <div class="col-md-8">
                <h5>Description:</h5>
                <p>{{ $post->description }}</p>
                <p><strong>Author:</strong> {{ $post->author }}</p>
                <p><strong>Location:</strong> {{ $post->location }}</p>
                <p><strong>Email:</strong> {{ $post->email }}</p>
                <p><strong>Phone:</strong> {{ $post->phone }}</p>
            </div>
        </div>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">Back to All Posts</a>
    </div>
</div>

@endsection
