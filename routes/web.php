<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\User;





Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/posts', function () {

    // $posts = Post::with(['author','category'])->get();
    $posts = Post::latest()->get();

    return view('posts', ['title' => 'blog', 'posts' => $posts]);
});


Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
        'title' => 'Single Post',
        'post' => $post,
    ]);
});

Route::get('/authors/{user:username}', function (User $user) {

    // $posts = $user->posts->load('category','author');
    return view('posts', [
        'title' =>count($user->posts).  '  Articel By'.$user->name,
        'posts' => $user->posts,
    ]);
});


Route::get('/categories/{category:slug}', function (Category $category) {

    // $posts = $category->posts->load('category','author');

    return view('posts', [
       'title' => 'Articl In '. $category->name,
       'posts'=> $category->posts
    ]);
});



Route::get('/about', function () {
    return view('about', ['title' => 'about']);
});
Route::get('/contact', function () {
    return view('contact', ['title' => 'contact']);
});
