<!doctype html>

<head>
    <title> Blog Project in Laravel</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.js" defer></script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            background-image: url('/images/background.png')
        }
    </style>
</head>

<body style="font-family: Open Sans, sans-serif flex flex-col min-h-screen">
    <section class="px-4 py-6 ">
        <nav class="md:flex md:justify-between md:items-center ">
            <div>
                <a href="/">
                    <img src="/images/mailbox-icon.svg" alt="Logo" width="165" height="10">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                <div x-data="{ open: false }">
                    <button x-on:click="open = ! open" class="bg-yellow-200 rounded  text-color-white px-2 border border-gray-400">{{ auth()->user()->name }} </button>
                 
                    <div x-show="open" >
                        <a href="/admin/posts/create" class="text-gray-100">Create Post</a><br>
                        <a href="/admin/posts" class="text-gray-100">Dashboard</a>
                    </div>
                </div>

                    

                    

                    

                    <form action="/logout" method="POST">
                        @csrf

                        <button type="submit"
                            class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 ">Logout</button>

                    </form>
                @else
                    <a href="/login"
                        class="bg-green-400 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Login</a>

                    <a href="/register"
                        class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                        Register
                    </a>

                @endauth
                <a href="#newsletter"
                    class="bg-gray-600 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Newsletter
                </a>
            </div>
        </nav>


        @yield('content')


        
        <footer id="newsletter"
            class="  bg-gray-300 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Problem with mailchimp.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="" action="#" class="lg:flex text-sm">
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" type="text" placeholder="Your email address"
                                class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
    @if (session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
            class="fixed bg-green-400 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
            <p>{{ session('success') }}</p>
        </div>
    @endif




</body>
