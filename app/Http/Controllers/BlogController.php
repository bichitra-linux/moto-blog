<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('published', true)->latest('published_at')->paginate(10);
        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        if (!$post->published) {
            abort(404);
        }
        return view('blog.show', compact('post'));
    }
}
