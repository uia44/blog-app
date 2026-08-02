@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card mb-4">
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

        {{-- Comments --}}
        <div class="card">
            <div class="card-body">

                <h3 class="mb-3">
                    Comments ({{ $post->comments->count() }})
                </h3>

                @auth

                    <form action="{{ route('comments.store', $post) }}" method="POST">

                        @csrf

                        <div class="mb-3">
                            <textarea
                                name="content"
                                class="form-control @error('content') is-invalid @enderror"
                                rows="3"
                                placeholder="Write a comment..."
                                required
                            >{{ old('content') }}</textarea>

                            @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button class="btn btn-primary">
                            Add Comment
                        </button>

                    </form>

                    <hr>

                @else

                    <div class="alert alert-info">
                        Please <a href="{{ route('login') }}">login</a> to leave a comment.
                    </div>

                @endauth

                @forelse($post->comments->sortByDesc('created_at') as $comment)

                    <div class="border rounded p-3 mb-3">

                        <div class="d-flex justify-content-between align-items-start">

                            <div>
                                <strong>{{ $comment->user->name }}</strong>

                                <br>

                                <small class="text-muted">
                                    {{ $comment->created_at->format('d M Y H:i') }}
                                </small>
                            </div>

                            @auth
                                @if(auth()->id() === $comment->user_id)

                                    <form
                                        action="{{ route('comments.destroy', $comment) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this comment?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>

                                @endif
                            @endauth

                        </div>

                        <hr>

                        <p class="mb-0">
                            {{ $comment->content }}
                        </p>

                    </div>

                @empty

                    <div class="alert alert-light">
                        No comments yet.
                    </div>

                @endforelse

            </div>
        </div>

    </div>
</div>

@endsection