<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function posts()
    {
        return view('posts', [
            'title' => 'Blog',
            'posts' => Post::latest()->filter(request()->only('search', 'category', 'author'))->paginate(6)->withQueryString()

        ]);
    }
}
