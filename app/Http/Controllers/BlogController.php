<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'categories'])
            ->where('is_published', true)
            ->latest('published_at')
            ->paginate(12);

        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::with(['user', 'categories', 'tags'])
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $post->increment('views');

        return view('blog.show', compact('post'));
    }
}
