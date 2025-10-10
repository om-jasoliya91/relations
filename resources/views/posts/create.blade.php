<!DOCTYPE html>
<html>
<head>
    <title>Add Post</title>
</head>
<body>

<h1>Create a New Post</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('posts.store') }}" method="POST">
    @csrf

    <label>Author:</label><br>
    <select name="author_id">
        <option value="">Select Author</option>
        @foreach ($authors as $author)
            <option value="{{ $author->id }}">{{ $author->author_name }}</option>
        @endforeach
    </select><br><br>

    <label>Title:</label><br>
    <input type="text" name="title" value="{{ old('title') }}"><br><br>

    <label>Content:</label><br>
    <textarea name="content">{{ old('content') }}</textarea><br><br>

    <button type="submit">Save Post</button>
</form>

</body>
</html>
