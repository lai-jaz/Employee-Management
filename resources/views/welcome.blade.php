<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Employee Manager</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body class="bg-gray-50 font-mono antialiased dark:bg-black dark:text-white/50">

    <!-- Classes for navigation links -->
    @php
        $navLinks = "rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-purple-500 hover:ease-in hover:duration-200 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white";
    @endphp
        <div class="text-black/50 dark:bg-black dark:text-white/50">
            <!--<img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />-->
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-purple-500 selection:text-white">
                <div class="relative w-full h-screen max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">   
                        <div class="flex lg:justify-center lg:col-start-2">
                        <img class="w-20 h-20" src="../public/images/logo.png">
                        </div>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="{{ $navLinks }}"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="{{ $navLinks }}"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="{{ $navLinks }}"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <main class="mt-6">
                        <div class="grid gap-6">
                           <div class="place-self-center mt-28"> 
                                <h1 class="text-6xl">
                                    Employee Management System
                                </h1>
                           </div>
                           <div class="h-52">

                           </div>
                        </div>
                    </main>

                    <footer class="py-8 text-center text-sm text-black dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
