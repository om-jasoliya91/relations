<?php
namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function allPost()
    {
        $posts = Post::with(['categories', 'author'])->get();
        $authors = Author::all();
        return view('posts.index', compact('posts', 'authors'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('posts.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'author_id' => 'required|exists:authors,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'author_id' => $request->author_id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post added successfully!');
    }

    public function showByAuthor($author_id)
    {
        // Get all posts that belong to this author
        // $posts = Post::with('author')
        //     ->where('author_id', $author_id)
        //     ->get();
        $posts = Post::with('author:id,author_name')  // eager load author, only id & name
            ->where('author_id', $author_id)
            ->select('id', 'author_id', 'content')  // fetch only content (and required relation keys)
            ->get();
        // Also get author details
        $author = Author::findOrFail($author_id);

        return view('posts.by_author', compact('author', 'posts'));
    }


    
}
