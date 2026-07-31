@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-body">

                <h1 class="card-title">
                    {{ $post->title }}
                </h1>

                <p class="text-muted">
                    <strong>Published:</strong>
                    {{ $post->published_at?->format('d M Y, H:i') ?? 'Draft' }}
                </p>

                <p>
                    <strong>Category:</strong>
                    {{ $post->category?->name ?? 'None' }}
                </p>

                <p>
                    <strong>Author:</strong>
                    {{ $post->user?->name ?? 'Unknown' }}
                </p>

                <hr>

                @if($post->image)
                    <img
                        src="{{ asset('storage/' . $post->image) }}"
                        alt="{{ $post->title }}"
                        class="img-fluid rounded mb-3"
                    >
                @endif

                <p class="card-text">
                    {{ $post->content }}
                </p>

                <div class="mt-3">

                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                        Back to Posts
                    </a>

                    @auth
                        @if(auth()->id() === $post->user_id)

                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">
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

                                <button class="btn btn-danger">
                                    Delete
                                </button>

                            </form>

                        @endif
                    @endauth

                </div>

            </div>
        </div>

    </div>
</div>

@endsection