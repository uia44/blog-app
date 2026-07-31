@extends('layouts.app')

@section('content')

<h1 class="mb-4">Create New Post</h1>

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label class="form-label">Title</label>

        <input
            type="text"
            name="title"
            class="form-control"
            value="{{ old('title') }}"
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Content</label>

        <textarea
            name="content"
            rows="6"
            class="form-control"
        >{{ old('content') }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Published At</label>

        <input
            type="datetime-local"
            name="published_at"
            class="form-control"
            value="{{ old('published_at') }}"
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
                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                >
                    {{ $category->name }}
                </option>

            @endforeach

        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">
            Image
        </label>

        <input
            type="file"
            name="image"
            class="form-control"
            accept="image/*"
        >
    </div>

    <button class="btn btn-primary">
        Create Post
    </button>

    <a href="{{ route('posts.index') }}" class="btn btn-secondary">
        Cancel
    </a>

</form>

@endsection