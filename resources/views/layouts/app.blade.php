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
    <body class="font-sans antialiased">
        <div class="grid overflow-hidden gap-0 h-screen" style="grid-template-columns: 80px 500px 1fr;">
            <!-- Sidebar-->
            <div class="hidden lg:bg-gradient-to-r lg:from-purple-500 lg:to-violet-500 hidden lg:pt-8 lg:block lg:flex lg:flex-col lg:h-screen text-white">                 
                <div class="flex flex-col space-y-4">
                    <img class="w-12 mx-auto" src="images/MotiveMobLogo.svg" />
                    <img class="w-18" src="images/Divide.svg" />
                </div>
                
                <nav class="flex-grow flex flex-col justify-center space-y-4">
                    <a href="#" class="group flex items-center justify-center rounded-lg">
                        <span class="sr-only">Menu</span>
                        <img class="w-6" src="images/menu.svg" />
                    </a>

                    <a href="#" class=" group flex items-center justify-center rounded-lg">
                        <span class="sr-only">Send</span>
                        <img class="w-6" src="images/Send.svg" />
                    </a>

                    <a href="#" class=" group flex items-center justify-center rounded-lg">
                        <span class="sr-only">Heart</span>
                        <img class="w-6" src="images/heart.svg" />
                    </a>

                    <a href="#" class=" group flex items-center justify-center rounded-lg">
                        <span class="sr-only">Gallery</span>
                        <img class="w-6" src="images/Gallery.svg" />
                    </a>

                    <a href="#" class=" group flex items-center justify-center rounded-lg">
                        <span class="sr-only">Note-3</span>
                        <img class="w-6" src="images/Note-3.svg" />
                    </a>

                    <a href="#" class=" group flex items-center justify-center rounded-lg">
                        <span class="sr-only">Headphone</span>
                        <img class="w-6" src="images/Headphone.svg" />
                    </a>

                    <a href="#" class=" group flex items-center justify-center rounded-lg">
                        <span class="sr-only">Dollar</span>
                        <img class="w-6" src="images/dollar.svg" />
                    </a>

                    <a href="#" class=" group flex items-center justify-center rounded-lg">
                        <span class="sr-only">Setting</span>
                        <img class="w-6" src="images/Setting.svg" />
                    </a>
                </nav>

                <div class="">
                    <a href="#" class=" group flex items-center justify-center rounded-lg">
                        <span class="sr-only">User</span>
                        <img class="w-20" src="images/User.svg" />
                    </a>
                </div>
            </div>

            <!-- Intro -->
            <div class="relative flex justify-center items-center" style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), #83DBEE;">
                <img class="absolute right-0" src="images/ribbon.svg" alt="">
                <div class="rounded-lg text-white p-4 bg-red-500/40 z-20 m-8 space-y-2">
                    <h2 class="font-semibold text-xl mb-4">Congratulations!</h2>
                    <p>You just created your program to begin getting motivated! We`ll shortly send you a confirmation text to receive your personalized motivation. </p>
                    <p>To get started now, review your dashboard below and invite others to give a quote and song to help inspire! </p>
                </div>
            </div>
                 
            <!-- Main area -->
            <div class="grid overflow-hidden grid-cols-1 grid-rows-6 gap-0 h-screen">
                <div class="bg-sky-50 row-start-1 row-end-2 relative flex justify-between items-center">
                    <div>
                        <img class="w-11 h-11 absolute top-8 left-8" src="images/back-arrow.png" alt="">
                    </div>
                    <div class="text-center">
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

                <div class="bg-white row-start-2 row-end-4">
                    {{$slot}}
                </div>

                <div class="row-start-4 row-end-7 bg-sky-300 relative text-white">
                    <img src="images/dashboard.png" class="absolute bottom-0 right-0 max-w-xl" alt="">
                    <p class="text-6xl absolute left-8 top-16">
                        <span class="font-semibold">Motivate</span><br /> to Be <span class="font-semibold">Your<br /> Best</span>
                    </p>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>