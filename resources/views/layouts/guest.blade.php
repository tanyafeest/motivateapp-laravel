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
       <div class="grid overflow-hidden gap-0 h-screen" style="grid-template-columns: 80px 460px 1fr;">
            <!-- Sidebar-->
            <div class="lg:bg-gradient-to-r lg:from-purple-500 lg:to-violet-500 hidden lg:pt-8 lg:block lg:flex lg:flex-col lg:h-screen text-white">                 
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
