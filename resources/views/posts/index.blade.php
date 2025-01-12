@extends('layouts.app')

@section('title', 'Table Posts')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start">Posts List</h3>
                    <div class="float-end">
                        <a href="/" class="btn btn-success">All Posts<span class="bi bi-eye mx-2"></span></a>
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create<span class="bi bi-plus-circle mx-2"></span></a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Content</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <img src="{{ asset('storage/posts/'.$post->image) }}"
                                            alt="Post Image"
                                            class="img-thumbnail"
                                            width="100">
                                        <!-- <dd>{{ asset('storage/posts/'.$post->image) }}</dd> -->
                                    </td>
                                    <td>{{ Str::limit($post->content, 100) }}</td>
                                    <td>
                                        <a href="{{ route('posts.show', $post) }}"
                                            class="btn btn-sm btn-success">
                                            <span class="bi bi-eye"></span>
                                        </a>
                                        <a href="{{ route('posts.edit', $post) }}"
                                            class="btn btn-sm btn-warning">
                                            <span class="bi bi-pencil"></span>
                                        </a>
                                        <form action="{{ route('posts.destroy', $post) }}"
                                            method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">
                                                <span class="bi bi-trash"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No posts found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection