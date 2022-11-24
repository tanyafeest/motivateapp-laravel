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
            <div id="intro" class="hidden bg-sky-300 h-screen relative lg:block">
                <!-- mobile only -->
                <img class="z-10 lg:hidden" src="images/m-bg.png" alt=""> 
                <img class="z-20 lg:hidden absolute top-32 w-[100px] left-[145px]" src="images/mm-logo.png" alt="">
                <x-button.white class="lg:hidden z-20 absolute bottom-12 w-[200px] left-[85px]" wire:click="step1">How It Works</x-button.white>

                <!-- desktop only -->
                <img class="hidden lg:block lg:absolute lg:top-0 lg:left-0" src="images/topbg.png" alt="">
                <img class="hidden lg:block lg:absolute lg:bottom-0 lg:right-0 lg:w-[360px] lg:z-30" src="images/womanblur.png" alt=""> 
                
                <div class="absolute top-[300px] lg:top-48 left-8 lg:left-8 text-5xl z-0 text-white">
                    <span class="font-semibold">Motivate</span><br /> to <span class="font-semibold">Be Your <br />Best</span>
                </div>
            </div>

            <!-- Main area -->
            <div class="text-white">
                
                {{$slot}}
            </div>
        </div>
    </body>
</html>
