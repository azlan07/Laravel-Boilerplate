@extends('layouts.app')

@section('title', 'Show')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start">{{ $post->title }}</h3>
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary float-end">Back</a>
                </div>
                <div class="card-body">
                    <p><strong>Slug:</strong> {{ $post->slug }}</p>
                    <p><strong>Content:</strong></p>
                    <p>{{ $post->content }}</p>
                    @if($post->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/posts/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                    </div>
                    @endif
                </div>
                <div class="card-footer">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection