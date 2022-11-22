<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="lg:grid lg:overflow-hidden lg:gap-0 h-screen" style="grid-template-columns: 80px 460px 1fr;">
            <!-- Sidebar-->
            @livewire('sidebar')

            <!-- Intro -->
            <div class="bg-sky-300">
                <div class="relative flex h-full flex-col">
                    <img src="images/topbg.png" alt="" class="absolute top-0 left-0">
                    <div class=" absolute top-48 left-8 text-5xl z-20 text-white"><span class="font-semibold">Motivate</span><br /> to <span class="font-semibold">Be Your <br />Best</span></div>
                    <img src="images/womanblur.png" alt="" class="absolute bottom-0 right-0 w-[360px]"> 
                </div>
            </div>

            <!-- Main area -->
            <div class="">
                <div class="text-white">
                    {{$slot}}
                </div>
            </div>
        </div>
    </body>
</html>
