@if ($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('author.store') }}" method="POST">
    @csrf
    <input type="text" name="author_name" placeholder="Author Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <textarea name="bio_text" placeholder="Biography" required></textarea>
    <input type="text" name="website" placeholder="Website">
    <button type="submit">Save</button>
</form>
