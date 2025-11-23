<!DOCTYPE html>
<html>

<head>
    <title>All Posts</title>
</head>

<body>
    {{-- <h1>All Posts</h1> --}}

    {{-- Success message --}}
    @if (session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    {{-- <a href="{{ route('posts.create') }}">Add New Post</a> --}}
    <hr>

    {{-- Optional: Show all authors --}}
    {{-- <h2>All Authors</h2>
    @foreach ($authors as $author)
        <p><strong>{{ $author->author_name }}</strong> ({{ $author->email }})</p>
    @endforeach
    <hr> --}}

    {{-- Posts with related author --}}
    {{-- <h2>All Posts</h2>
    @foreach ($posts as $post)
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>

        @if ($post->author)
            <p><strong>Author:</strong> {{ $post->author->author_name }} ({{ $post->author->email }})</p>
        @else
            <p><em>No author found.</em></p>
        @endif

        <hr>
    @endforeach --}}



    {{-- here example of with many-to-many display file  --}}
    <h1>All Posts</h1>

    @if (session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <a href="{{ route('posts.create') }}">Add New Post</a>
    <hr>

    <h2>All Authors</h2>
    @foreach ($authors as $author)
        <p><strong>{{ $author->author_name }}</strong> ({{ $author->email }})</p>
    @endforeach
    <hr>

    <h2>All Posts</h2>
    @foreach ($posts as $post)
        <h3>{{ $post->title }} (Author: {{ $post->author->author_name }})</h3>
        <p>{{ $post->content }}</p>

        <p><strong>Categories:</strong>
            @foreach ($post->categories as $category)
                {{ $category->name }}@if (!$loop->last)
                    ,
                @endif
            @endforeach
        </p>
        <hr>
    @endforeach
</body>

</html>
