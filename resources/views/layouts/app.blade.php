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
            <div id="intro" class="hidden lg:relative lg:flex lg:flex-col lg:items-center">
                <img class="absolute right-0" src="images/ribbon.svg" alt="">
                <!-- Desktop only -->
                <img class="w-44 h-44 mt-24" src="images/m-logo.png" alt="">
                <div class="-mt-12">
                        <x-account-creation-msg></x-account-creation-msg>
                    </div>
                
            </div>
                 
            <!-- Main area -->
            <div id="main" class="flex flex-col lg:overflow-auto lg:grid lg:grid-cols-1 lg:grid-rows-[12] lg:gap-0">
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
                <div class="lg:hidden flex flex-col items-center">
                    <img class="w-44 h-44 mb-12" src="images/m-logo.png" alt="">
                    <div class="-mt-20">
                        <x-account-creation-msg></x-account-creation-msg>
                    </div>
                    
                </div>
                
                {{$slot}}

                <!-- Footer: hide on lg+ -->
                <div class="lg:hidden fixed bottom-0 left-0 w-full px-8 -py-4 mt-20 bg-gray-50 rounded-lg shadow-lg z-20">
                    <div class="flex justify-between text-2xl text-zinc-400 items-center">
                        <a href="/dashboard"><img src="images/menu-home.svg" alt=""></a>
                        <a href="/dashboard"><img src="images/menu-share.svg" alt=""></a>
                        <a href="/dashboard"><img src="images/menu-main.svg" alt=""></a>
                        <a href="/dashboard"><img src="images/menu-upgrade.svg" alt=""></a>
                        <a href="/dashboard"><img src="images/menu-settings.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>