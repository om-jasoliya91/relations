<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Biography;
use App\Models\Post;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function create()
    {
        return view('author.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'author_name' => 'required',
            'email' => 'required|email|unique:authors,email',
            'bio_text' => 'required',
            'website' => 'nullable|url',
        ]);

        $author = Author::create([
            'author_name' => $request->author_name,
            'email' => $request->email,
        ]);

        $author->biography()->create([
            'bio_text' => $request->bio_text,
            'website' => $request->website,
        ]);

        return redirect()->back()->with('success', 'Author and Biography created!');
    }

    // public function index()
    // {
    //     // if i use this so only print authors data
    //     // $authors = Author::all();

    //     // this is dislay data which is connected with biography useing field name
    //     // $authors = Author::with('biography')->get();
    //     $authors = Author::with('biography:id,author_id,bio_text,website')->get();

    //     // echo '<pre>';
    //     // print_r($authors);
    //     // echo '</pre>';
    //     // exit;
    //     return view('author.index', compact('authors'));
    // }

    public function allPosts()
    {
        // Get all posts with their author
        $posts = Post::with('author')->get();

        // Pass posts to the view
        return view('posts.index', compact('posts'));
    }
}
