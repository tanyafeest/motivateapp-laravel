<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased h-screen">
        <div class="lg:grid lg:overflow-hidden lg:gap-0 lg:h-screen" style="grid-template-columns: 80px 500px 1fr;">
            <!-- Sidebar-->
            @livewire('sidebar')

            <!-- Intro -->
            <div id="intro" class="hidden lg:relative lg:flex lg:justify-center lg:items-center">
                <img class="absolute right-0" src="images/ribbon.svg" alt="">
                <!-- Desktop only -->
                @livewire('account-creation-msg')
            </div>
                 
            <!-- Main area -->
            <div id="main" class="lg:overflow-auto lg:grid lg:grid-cols-1 lg:grid-rows-[12] lg:gap-0">
                <div class="lg:bg-sky-50 lg:row-span-1 lg:relative flex justify-between items-center">
                    <div>
                        <img class="lg:hidden w-11 h-11 m-2 lg:m-0" src="images/mobile-menu.png" alt="">
                        <img class="hidden lg:block lg:w-11 lg:h-11 lg:absolute lg:top-4 lg:left-4" src="images/back-arrow.png" alt="">
                    </div>
                    <div class="text-center text-white lg:text-gray-800">
                        <p>Account Information:</p>
                        <p class="font-semibold">Lisa Smith</p>
                    </div>
                    <div class="">
                        <a href="#" class="group flex items-center justify-center rounded-lg">
                            <span class="sr-only">User</span>
                            <img class="w-20" src="images/User.svg" />
                        </a>
                    </div>
                </div>
                <!-- Mobile only -->
                <div class="lg:hidden">
                    @livewire('account-creation-msg')
                </div>
                
                {{$slot}}
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>