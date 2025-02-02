<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyDashboardPostController;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/posts', [PostController::class,'posts']);


// Auth
Route::get('/login',[AuthController::class, 'viewLogin'])->middleware('guest');
Route::post('/login',[AuthController::class, 'authenticate'])->name('login');
Route::get('/register',[AuthController::class, 'viewRegister'])->middleware('guest');;
Route::post('/register',[AuthController::class, 'storeRegister'])->middleware('guest');;
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');

Route::get ('/mydashboard', [DashboardController::class,'index'])->middleware('auth');

Route::get('/dashboard/posts/checkSlug',[MyDashboardPostController::class, 'checkSlug']);
Route::resource('/mydashboard/posts', MyDashboardPostController::class)->middleware('auth');






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




Route::get('/about', function () {
    return view('about', ['title' => 'about']);
});
Route::get('/contact', function () {
    return view('contact', ['title' => 'contact']);
});


