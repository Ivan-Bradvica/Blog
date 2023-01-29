@extends('components/layout')


@section('content')
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-200 border border-gray-200 p-6 rounded-xl">
            <h3 class="text-center font-bold text-xl">Log In!</h3>


            <form method="POST" action="/sessions" class="mt-10">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">E-mail</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="border border-gray-400 p-2 w-full">





                    @error('email')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required
                        class="border border-gray-400 p-2 w-full">

                    @error('password')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="mb-6 py-2">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-400">Log
                        In</button>
                </div>


            </form>
        </main>

    </section>
@endsection
