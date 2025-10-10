<!DOCTYPE html>
<html>
<head>
    <title>Posts by {{ $author->author_name }}</title>
</head>
<body>
    <h1>Posts by {{ $author->author_name }}</h1>
    <p>Email: {{ $author->email }}</p>
    <hr>

    @if($posts->count())
        @foreach($posts as $post)
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->content }}</p>
            <hr>
        @endforeach
    @else
        <p>No posts found for this author.</p>
    @endif
</body>
</html>
