<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Blog Posts</title>
</head>
<body>
    <h1>Blog Posts</h1>
    <a href="{{ route('posts.create') }}">Create New Post</a>

    <hr>
    @forelse($posts as $post)
        <div style="margin-bottom:20px;">
            <h2>{{ $post->title }}</h2>

            <p>{{ $post->content }}</p>

            <p>
                <strong>Published:</strong>
                {{ $post->published_at ?? 'Draft' }}
            </p>

            <a href="{{ route('posts.edit', $post) }}">Edit</a>

            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>

            <hr>
        </div>
    @empty
        <p>No posts found.</p>
    @endforelse
</body>
</html>