@props(['comment'])
<article class="flex bg-gray-200 p-6 rounded-xl border-gray-300 space-x-4 " >
    <div class="flex-shrink-0 ">
        <img src="https://i.pravatar.cc/100" alt="" width="60" height="60" class="rounded-xl">
    </div>
    <div>
        <header class="mb-4">
            
               <h3 class="font-bold"> {{$comment->author->name}}</h3>
            
            
            <p class="text-xs">Posted  {{$comment->created_at->format('F j, Y g:i a')}} </p>
        </header>

         {{$comment->body}}

    </div>
</article>