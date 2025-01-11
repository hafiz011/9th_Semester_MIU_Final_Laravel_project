@extends('layout.master')

@section('content')

<!-- Success/Error Message (if any) -->
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
        <h3>All Posts</h3>
        <!-- Add Create New Post Button -->
        <a href="{{ route('posts.create') }}" class="btn btn-primary float-right">Create New Post</a>
    </div>
    <div class="card-body">
        <!-- Table Displaying Posts -->
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col" width="5">Id</th>
                    <th scope="col" width="20">Image</th>
                    <th scope="col" width="20">Title</th>
                    <th scope="col" width="25">Description</th>
                    <th scope="col" width="5">Author</th>
                    <th scope="col" width="5">Location</th>
                    <th scope="col" width="10">Email</th>
                    <th scope="col" width="10">Phone</th>
                    <th scope="col" width="10">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <img src="{{ $post->image }}" width="80" height="80" alt="Post Image">
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->author }}</td>
                    <td>{{ $post->location }}</td>
                    <td>{{ $post->email }}</td>
                    <td>{{ $post->phone }}</td>
                    <td>

                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links (if needed) -->
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>

@endsection
