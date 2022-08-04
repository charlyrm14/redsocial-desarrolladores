<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> CodeGram | @yield('title') </title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap" rel="stylesheet">
        @stack('styles')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
        @stack('js')

        @livewireStyles
    </head>
    <body class="bg-gray-100">

        @include('layouts.header')

        <main class="container mx-auto mt-10 ">

            <h2 class="text-center text-xl mb-10 uppercase"> @yield('page-title') </h2>

            @yield('content')

        </main>

        @include('layouts.footer')
      
       @livewireScripts
    </body>
</html>
