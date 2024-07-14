<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/6dd2164741.js" crossorigin="anonymous"></script>

        <!-- Table Css -->
        <link href="../public/tableCSS.css" rel="stylesheet" />

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            @include('layouts.navigation')

            <!-----flash messages for successful action--->
            @if(session()->has('success-add'))
            <x-flash-message> Added record successfully</x-flash-message>
            @elseif(session()->has('success-delete'))
            <x-flash-message> Deleted record successfully</x-flash-message>
            @elseif(session()->has('success-update'))
            <x-flash-message> Updated record successfully</x-flash-message>
            @endif

            <!-----flash messages for unsuccessful action--->
            @if(session()->has('error-add'))
            <x-flash-message-fail>Failed to add record</x-flash-message-fail>
            @elseif(session()->has('error-delete'))
            <x-flash-message-fail> Failed to delete record</x-flash-message-fail>
            @elseif(session()->has('error-update'))
            <x-flash-message-fail> Failed to update record</x-flash-message-fail>
            @endif

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow font-mono">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
