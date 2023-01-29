<?php
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [PostController::class,'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class,'show']);


Route::get('categories/{category:slug}',[PostController::class,'category']);

Route::get('authors/{author:username}', function (User $author) {
    return view('posts',[
        'posts'=> $author->posts,
        'categories'=>Category::all(),
        'users'=>User::all()
        
    ]);
});

Route::get('register', [RegisterController::class,'create'])->middleware('guest');
Route::post('register', [RegisterController::class,'store'])->middleware('guest');


Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::post('posts/{post:slug}/comments', [PostCommentsController::class,'store']);

Route::get('admin/posts/', [AdminPostController::class,'index'])->middleware('admin');
Route::get('admin/posts/create', [PostController::class,'create'])->middleware('admin');
Route::post('admin/posts', [PostController::class,'store'])->middleware('admin');
Route::get('admin/posts/{post}/edit', [AdminPostController::class,'edit'])->middleware('admin');
Route::patch('admin/posts/{post}', [AdminPostController::class,'update'])->middleware('admin');
Route::delete('admin/posts/{post}', [AdminPostController::class,'destroy'])->middleware('admin');



