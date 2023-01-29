
@extends('components/layout')


@section('content')
    <section class="px-6 py-8 mt-10 max-w-lg mx-auto mt-10 bg-gray-300 border border-blue-200 p-6 rounded-xl">
        
            <h3 class="text-center font-bold text-xl" >Edit Post: <p>{{$post->title}}</p> </h3>
            
            <form method="POST" action="/admin/posts/{{$post->id}}" >
                @csrf
                @method('PATCH')
                

                <div class="mb-6">
                   
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700" >Title</label>

                    <input type="text" name="title" id="title" required class="border border-gray-400 p-2 w-full" >


                </div>

                <div class="mb-6">
                   
                    <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">Slug</label>

                    <input type="text" name="slug" id="slug" required class="border border-gray-400 p-2 w-full">


                </div>




                <div class="mb-6">
                    <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">Excerpt</label>

                    <textarea type="text" name="excerpt" id="excerpt" required class="border border-gray-400 p-2 w-full"></textarea>


                </div>



                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">Body</label>
                    <textarea type="text" name="body" id="body" value="{{ old('email') }}" required
                        class="border border-gray-400 p-2 w-full"></textarea>


                </div>

                <div class="mb-6"> 
                    <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>

                    <select name="category_id" id="category_id">
                        @php
                            $categories=\App\Models\Category::all();
                        @endphp

                        @foreach ( $categories as  $category)
                            <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                            
                        @endforeach

                    </select>

                </div>




                <div class="mb-6 py-2">
                    <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-400">Update Post</button>
                </div>




               



            </form>

        

    </section>

@endsection