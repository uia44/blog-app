<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
</head>
<body>

<h1>Edit Post</h1>

<form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Title</label><br>
    <input type="text" name="title" value="{{ old('title', $post->title) }}"><br><br>

    <label>Content</label><br>
    <textarea name="content" rows="6" cols="50">{{ old('content', $post->content) }}</textarea><br><br>

    <label>Published At</label><br>
    <input
        type="datetime-local"
        name="published_at"
        value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}"
    ><br><br>

    <button type="submit">Update Post</button>
</form>

<br>

<a href="{{ route('posts.index') }}">Back to Posts</a>

</body>
</html>