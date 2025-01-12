@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
<div class="container mt-4">
    <h1>Welcome</h1>
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-4 mb-3">
            <div class="card">
                <img src="{{ asset('storage/posts/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>
@endsection