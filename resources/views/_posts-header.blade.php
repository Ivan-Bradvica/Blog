<header class="max-w-xl mx-auto  text-center mt-1">
    <h1 class="text-4xl text-slate-100">
         <p class="bg-yellow-100 rounded-xl py-1 ">Laravel News Blog</p> 
    </h1>

    


    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
        <!--  Category -->
        <div class="relative  lg:inline-flex bg-gray-100 rounded-xl">

            
            

            <x-dropdown>
                
                @foreach ($categories as $category)
                    <a href="/categories/{{ $category->slug }}" class="block text-left px-3 hover:bg-gray-300 w-32">
                        {{ $category->name }}</a>
                @endforeach

                
            </x-dropdown>









        </div>

        <!-- Other Filters -->
        

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="#">
                <input type="text" name="search" placeholder="Find something"
                    class="bg-transparent placeholder-black font-semibold text-sm">
            </form>
        </div>
    </div>
</header>


