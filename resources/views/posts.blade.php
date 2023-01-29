{{--}}
@foreach ($posts as $post)
    <article>
        <h3>
            <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
        </h3>
    </article>
    <article>

        <p>
            By <a href="/authors/{{$post->author->username}}">{{$post->author->name }}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        </p>

        <div>
            {{ $post->excerpt }}
        </div>

@endforeach


{{--}}

@extends('components/layout')


@section('content')


@include('_posts-header')

<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6 ">
    

    @if ($posts->count())
    <x-posts-grid :posts="$posts" />
    
      
    @else
    
    <h3 class="text text-red-500 text-4xl font-bold" align="center">No posts found!</h3>
        
    @endif
  
</main>


@endsection
