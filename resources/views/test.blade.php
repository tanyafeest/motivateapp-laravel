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
            <div class="hidden text-white lg:bg-gradient-to-r lg:from-purple-500 lg:to-violet-500 lg:pt-8 lg:block lg:flex lg:flex-col lg:h-screen">                 
                <div class="flex flex-col space-y-4">
                    <img class="w-12 mx-auto" src="images/MotiveMobLogo.svg" />
                    <img class="w-18" src="images/Divide.svg" />
                </div>
                
                <nav class="flex flex-col justify-center flex-grow space-y-6">
                    <a href="/dashboard" class="flex items-center justify-center rounded-lg group">
                        <span class="sr-only">Menu</span>
                        <img class="w-6" src="images/menu.svg" />
                    </a>

                    <a href="#" class="flex items-center justify-center rounded-lg group">
                        <span class="sr-only">Send</span>
                        <img class="w-6" src="images/Send.svg" />
                    </a>

                    <a href="/inspiration" class="flex items-center justify-center rounded-lg group">
                        <span class="sr-only">Heart</span>
                        <img class="w-6" src="images/heart.svg" />
                    </a>

                    <a href="#" class="flex items-center justify-center rounded-lg group">
                        <span class="sr-only">Gallery</span>
                        <img class="w-6" src="images/Gallery.svg" />
                    </a>

                    <a href="#" class="flex items-center justify-center rounded-lg group">
                        <span class="sr-only">Note-3</span>
                        <img class="w-6" src="images/Note-3.svg" />
                    </a>

                    <a href="#" class="flex items-center justify-center rounded-lg group">
                        <span class="sr-only">Headphone</span>
                        <img class="w-6" src="images/Headphone.svg" />
                    </a>

                    <a href="/upgrade" class="flex items-center justify-center rounded-lg group">
                        <span class="sr-only">Dollar</span>
                        <img class="w-6" src="images/dollar.svg" />
                    </a>

                    <a href="/settings" class="flex items-center justify-center rounded-lg group">
                        <span class="sr-only">Setting</span>
                        <img class="w-6" src="images/Setting.svg" />
                    </a>
                </nav>

                <div class="">
                    <a href="#" class="flex items-center justify-center rounded-lg group">
                        <span class="sr-only">User</span>
                        <img class="w-20" src="images/User.svg" />
                    </a>
                </div>
            </div>

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
                <!-- Header/Title -->
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

                <!-- slot content -->
                <div id="step1" class="lg:row-span-11">
                    <div class="flex grid items-end grid-cols-2 row-span-2 px-8 pb-8 bg-sky-50">
                        <div class="">
                            <h1 class="text-6xl font-bold">Stronger</h1>
                            <p class="text-4xl font-light">Kanye West</p>
                        </div>
                        <div class="flex justify-end space-x-8">
                            <img class="w-4 h-4" src="images/favorite-filled.png" alt="">
                            <img class="w-4 h-4" src="images/shuffle.png" alt="">
                            <img class="w-4 h-4" src="images/repeat.png" alt="">
                            <img class="w-4 h-4" src="images/share.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>