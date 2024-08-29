<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="bg-white">
            <!-- Header -->
            <header class="absolute inset-x-0 top-0 z-50">
                <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                    <div class="flex lg:flex-1">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">{{ env('APP_NAME', 'Activities App') }}</span>
                            <img class="h-20 w-auto" src="/ccci_logo.png"
                                alt="">
                        </a>
                    </div>
                    <div class="flex lg:gap-x-12">
                        <a href="{{ route('home') }}" class="text-lg font-semibold leading-6 text-gray-900">Home</a>
                        <a href="{{ route('activities') }}" class="text-lg font-semibold leading-6 text-gray-900">Activities</a>
                        <a href="{{ route('people') }}" class="text-lg font-semibold leading-6 text-gray-900">People</a>
                        <a href="{{ route('sessions.index') }}" class="text-lg font-semibold leading-6 text-gray-900">Sessions</a>
                    </div>
                    <div class="flex lg:flex-1 lg:justify-end">
                        @if(Auth::check())
                            <span class="text-sm font-semibold leading-6 text-gray-900">Logged in as
                                <span class="underline">{{ Auth::user()->name }}</span>
                            </span>
                            <span>&emsp;|&emsp;</span>
                            <a href="{{ route('logout') }}" class="text-sm font-semibold leading-6 text-gray-900">Log out <span
                                aria-hidden="true">&rarr;</span></a>
                        @else
                            <a href="{{ route('login')}}" class="text-sm font-semibold leading-6 text-gray-900">Log in <span
                                aria-hidden="true">&rarr;</span></a>
                        @endif
                    </div>
                </nav>
            </header>

            <main class="isolate mt-20">
                 @if ($errors->any())
                    <div class="w-full" style="position: fixed; bottom:0;left:0;z-index: 9999;">
                        @foreach ($errors->all() as $error)
                            <div class="bg-red-400 text-center p-2 w-full error-msg">{{$error}}</div>
                        @endforeach
                        <script>
                            setTimeout(() => {
                                document.querySelectorAll('.error-msg').forEach((el) => {
                                    el.remove();
                                });
                            }, 10000);
                        </script>
                    </div>
                @endif
                {{ $slot }}
            </main>

            <!-- Footer -->
            <div class="mx-auto mt-32 max-w-7xl px-6 lg:px-8">
                <footer aria-labelledby="footer-heading" class="relative border-t border-gray-900/10 py-24 sm:mt-56 sm:py-32">
                    <h2 id="footer-heading" class="sr-only">Footer</h2>
                    <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>