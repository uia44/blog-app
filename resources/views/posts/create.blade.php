<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>

<h1>Create New Post</h1>

<form action="{{ route('posts.store') }}" method="POST">
    @csrf

    <label>Title</label><br>
    <input type="text" name="title"><br><br>

    <label>Content</label><br>
    <textarea name="content" rows="6" cols="50"></textarea><br><br>

    <label>Published At</label><br>
    <input type="datetime-local" name="published_at"><br><br>

    <button type="submit">Create Post</button>
</form>

<br>

<a href="{{ route('posts.index') }}">Back to Posts</a>

</body>
</html>