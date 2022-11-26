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
    <body class="h-screen font-sans antialiased">
        <div class="lg:grid lg:overflow-hidden lg:gap-0 lg:h-screen" style="grid-template-columns: 80px 500px 1fr;">
            <!-- Sidebar-->
            @livewire('sidebar')

            <!-- Intro -->
            <div id="intro" class="hidden lg:relative lg:flex lg:flex-col lg:items-center">
                <img class="absolute right-0" src="images/ribbon.svg" alt="">
                <!-- Desktop only -->
                <img class="mt-24 w-44 h-44" src="images/m-logo.png" alt="">
                @if(Request::is('dashboard'))
                <div class="-mt-12">
                    <x-account-creation-msg></x-account-creation-msg>
                </div>
                @endif
            </div>
                 
            <!-- Main area -->
            <div id="main" class="flex flex-col lg:overflow-auto lg:grid lg:grid-cols-1 lg:grid-rows-[12] lg:gap-0 pb-20 bg-white lg:pb-0">
                <div class="flex items-center justify-between lg:bg-sky-50 lg:row-span-1 lg:relative">
                    <div>
                        <img class="m-2 lg:hidden w-11 h-11 lg:m-0" src="images/mobile-menu.png" alt="">
                        <img class="hidden lg:block lg:w-11 lg:h-11 lg:absolute lg:top-4 lg:left-4" src="images/back-arrow.png" alt="">
                    </div>
                    <div class="text-center text-white lg:text-gray-800">
                        <p>Account Information:</p>
                        <p class="font-semibold">Lisa Smith</p>
                    </div>
                    <div class="">
                        <a href="#" class="flex items-center justify-center rounded-lg group">
                            <span class="sr-only">User</span>
                            <img class="w-20" src="images/User.svg" />
                        </a>
                    </div>
                </div>

                <!-- Mobile only -->
                <div class="flex flex-col items-center lg:hidden">
                    <img class="mb-12 w-44 h-44" src="images/m-logo.png" alt="">
                    @if(Request::is('dashboard'))
                    <div class="-mt-20">
                        <x-account-creation-msg></x-account-creation-msg>
                    </div>
                    @endif
                </div>
                
                {{$slot}}

                <!-- Mobile only -->
                <div class="fixed bottom-0 left-0 z-20 w-full px-8 mt-20 rounded-lg shadow-lg lg:hidden -py-4 bg-gray-50">
                    <div class="flex items-center justify-between text-2xl text-zinc-400">
                        <a href="/dashboard"><img src="images/menu-home.svg" alt=""></a>
                        <a href="/dashboard"><img src="images/menu-share.svg" alt=""></a>
                        <a href="/dashboard"><img src="images/menu-main.svg" alt=""></a>
                        <a href="/upgrade"><img src="images/menu-upgrade.svg" alt=""></a>
                        <a href="/settings"><img src="images/menu-settings.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>