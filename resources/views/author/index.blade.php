<!DOCTYPE html>
<html>

<head>
    <title>Authors & Websites</title>
</head>

<body>
    <h1>Author Websites</h1>

    @foreach ($authors as $author)
        @if ($author->biography)
            <p>{{ $author->author_name }}</p>
            <p>{{ $author->biography->id }}</p>
            <p>{{ $author->biography->bio_text }}</p>
            <p>{{ $author->biography->website }}</p>
        @else
            <p>No biography available</p>
        @endif
    @endforeach

</body>

</html>
