<?php

namespace App\Http\Controllers;



use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6),
            'categories' => Category::all(),
            'users' => User::all()

        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'post' => $post,
            'users' => User::all()

        ]);
    }
    public function category(Category $category)
    {
        return view('posts', [
            'posts' => $category->posts,
            'currentCategory' => Category::firstWhere('slug', request('category')),
            'categories' => Category::all(),
            'users' => User::all()
        ]);
    }

    public function getPosts()
    {

        $posts = Post::latest();

        if (request('search')) {
            $posts
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%')
                ->orWhere('author', 'like', '%' . request('search') . '%');
        }
        return $posts->get();
    }

    public function create()
    {
        
            return view('admin.posts.create');
            
        
    }

    public function store()
    {

       
        
            $attributes = request()->validate([
                'title' => 'required',
                'slug'=>'required',
                'excerpt' => 'required',
                'body' => 'required',
                'category_id' => ['required', Rule::exists('categories','id')]
            ]);
        
        $attributes['user_id'] = auth()->id();

        Post::create($attributes);

        return redirect('/');
    
    }
}
