@extends('layouts.app')

@section('content')

<h1 class="mb-4">Blog Posts</h1>

<div class="d-flex justify-content-between align-items-center mb-3">

    <form action="{{ route('posts.index') }}" method="GET" class="d-flex">

        <input
            type="text"
            name="search"
            class="form-control me-2"
            placeholder="Search posts..."
            value="{{ request('search') }}"
        >

        <button class="btn btn-outline-primary">
            Search
        </button>

    </form>

    <a href="{{ route('posts.create') }}" class="btn btn-primary">
        Create New Post
    </a>

</div>

@forelse($posts as $post)

<div class="card mb-3">
    <div class="card-body">

        @if($post->image)
            <img
                src="{{ asset('storage/' . $post->image) }}"
                alt="{{ $post->title }}"
                class="img-fluid rounded mb-3"
                style="max-height:250px; object-fit:cover;"
            >
        @endif

        <h3 class="card-title">
            <a
                href="{{ route('posts.show', $post) }}"
                class="text-decoration-none"
            >
                {{ $post->title }}
            </a>
        </h3>

        <p class="card-text">
            {{ $post->content }}
        </p>

        <p class="text-muted">
            <strong>Published:</strong>
            {{ $post->published_at?->format('d M Y, H:i') ?? 'Draft' }}
        </p>

        <p>
            <strong>Category:</strong>
            {{ $post->category?->name ?? 'None' }}
        </p>

        <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">
            View
        </a>

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

<div class="mt-4 d-flex justify-content-center">
    {{ $posts->links() }}
</div>

@endsection