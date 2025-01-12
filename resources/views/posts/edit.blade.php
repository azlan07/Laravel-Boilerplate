@extends('layouts.app')

@section('title', 'Show')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start">Edit Post</h3>
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary float-end">Back</a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea name="content" class="form-control" rows="5" required>{{ old('content', $post->content) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Current Image</label><br>
                            <img src="{{ asset('storage/posts/'.$post->image) }}" alt="Current Image" class="img-thumbnail" width="200">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New Image (optional)</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection