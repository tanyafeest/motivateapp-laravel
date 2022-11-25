<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Motive Mob') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="lg:grid lg:overflow-hidden lg:gap-0 h-screen" style="grid-template-columns: 80px 460px 1fr;">
            <!-- Sidebar-->
            @livewire('sidebar')

            <div class="bg-sky-300 h-screen relative hidden lg:block">
                <!-- desktop only -->
                <img class="lg:block lg:absolute lg:top-0 lg:left-0" src="images/topbg.png" alt="">
                <img class="lg:block lg:absolute lg:bottom-0 lg:right-0 lg:w-[360px] lg:z-30" src="images/womanblur.png" alt=""> 
                
                <div class="absolute top-[300px] lg:top-48 left-8 lg:left-8 text-5xl z-0 text-white">
                    <span class="font-semibold">Motivate</span><br /> to <span class="font-semibold">Be Your <br />Best</span>
                </div>
            </div>

            <!-- Main area -->
            <div class="text-white">
                {{$slot}}
            </div>
        </div>
        
        @stack('modals')

        @livewireScripts
    </body>
</html>