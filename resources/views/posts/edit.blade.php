@extends('layouts.app')

@section('content')

<h1 class="mb-4">Edit Post</h1>

<form action="{{ route('posts.update', $post) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Title</label>

        <input
            type="text"
            name="title"
            class="form-control"
            value="{{ old('title', $post->title) }}"
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Content</label>

        <textarea
            name="content"
            rows="6"
            class="form-control"
        >{{ old('content', $post->content) }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Published At</label>

        <input
            type="datetime-local"
            name="published_at"
            class="form-control"
            value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}"
        >
    </div>

    <div class="mb-3">

        <label class="form-label">
            Category
        </label>

        <select
            name="category_id"
            class="form-select"
        >

            <option value="">
                -- No Category --
            </option>

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                >
                    {{ $category->name }}
                </option>

            @endforeach

        </select>

    </div>

    <button class="btn btn-success">
        Update Post
    </button>

    <a href="{{ route('posts.index') }}" class="btn btn-secondary">
        Cancel
    </a>

</form>

@endsection