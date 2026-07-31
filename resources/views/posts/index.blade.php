@extends('layouts.app')

@section('content')

<h1 class="mb-4">Blog Posts</h1>

<a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">
    Create New Post
</a>

@forelse($posts as $post)

<div class="card mb-3">
    <div class="card-body">

        <h3 class="card-title">
            {{ $post->title }}
        </h3>

        <p class="card-text">
            {{ $post->content }}
        </p>

        <p class="text-muted">
            <strong>Published:</strong>
            {{ $post->published_at?->format('d M Y, H:i') ?? 'Draft' }}
        </p>

        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">
            Edit
        </a>

        <form
            action="{{ route('posts.destroy', $post) }}"
            method="POST"
            class="d-inline"
            onsubmit="return confirm('Are you sure you want to delete this post?')"
        >
            @csrf
            @method('DELETE')

            <button class="btn btn-danger btn-sm">
                Delete
            </button>
        </form>

    </div>
</div>

@empty

<div class="alert alert-info">
    No posts found.
</div>

@endforelse

<div class="mt-4">
    {{ $posts->links() }}
</div>

@endsection