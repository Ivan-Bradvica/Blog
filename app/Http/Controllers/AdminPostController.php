<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Post;
class AdminPostController extends Controller
{
    public function index(){
        return view('admin/posts/index',[
            'posts'=>Post::paginate(50)
        ]);
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
    public function edit(Post $post){
        return view('admin/posts/edit',['post'=>$post]);
    }
    public function update (Post $post){
        $attributes = request()->validate([
            'title' => 'required',
            'slug'=>'required',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories','id')]

            
        ]);
        $post->update($attributes);

        return back()->with('success','Post updated.');

    }
    public function destroy(Post $post){
        $post->delete();
        return back()->with('success','Post deleted!');
    }
   
}
