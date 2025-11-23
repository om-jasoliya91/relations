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

    public function index()
    {
    //    Only Authors (without Biography)
        $authors = Author::all();

        // Authors with Biography (Eager Loading)
        // $authors = Author::with('biography')->get();
        // Always include author_id (foreign key) so relation works.
        // $authors = Author::with('biography:id,author_id,bio_text')->get();

        // $authors = Author::whereHas('biography',function($q){
        //     $q->where('bio_text','like','%developer%');
        // })->with('biography')->get();

        // Get only authors that have biography
        // $authors = Author::has('biography')->with('biography')->get();

        // Get authors that do not have biography
        //$authors = Author::doesntHave('biography')->get();

       // Load biography after fetching authors (Lazy Loading)
       // $authors = Author::all();
      //  $authors->load('biography'); // biography NOT loaded here

        return view('author.index', compact('authors'));
    }

    public function allPosts()
    {
        // Get all posts with their author
        $posts = Post::with('author')->get();

        // Pass posts to the view
        return view('posts.index', compact('posts'));
    }
}
