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

        {{-- Intl tele --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="grid h-screen gap-0 overflow-hidden" style="grid-template-columns: 80px 460px 1fr;">
            <!-- Sidebar-->
            <div class="hidden text-white lg:bg-gradient-to-r lg:from-purple-500 lg:to-violet-500 lg:pt-8 lg:flex lg:flex-col lg:h-screen">                 
                <div class="flex flex-col space-y-4">
                    <img class="w-12 mx-auto" src="images/MotiveMobLogo.svg" />
                    <img class="w-18" src="images/Divide.svg" />
                </div>
                
                <nav class="flex flex-col justify-center flex-grow space-y-14">
                    <a href="/dashboard" class="flex items-center justify-center rounded-lg group">
                        <span class="sr-only">Menu</span>
                        <img class="w-6" src="images/Menu.svg" />
                    </a>

                    <a href="#" class="flex items-center justify-center rounded-lg group">
                        <span class="sr-only">Send</span>
                        <img class="w-6" src="images/Send.svg" />
                    </a>

                    <a href="/inspiration" class="flex items-center justify-center rounded-lg group">
                        <span class="sr-only">Heart</span>
                        <img class="w-6" src="images/Heart.svg" />
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
                        <img class="w-6" src="images/Dollar.svg" />
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
            <div class="bg-sky-300">
                <div class="relative flex flex-col h-full">
                    <img src="images/topbg.png" alt="" class="absolute top-0 left-0">
                    <div class="absolute z-20 text-5xl text-white top-48 left-8"><span class="font-semibold">Motivate</span><br /> to <span class="font-semibold">Be Your <br />Best</span></div>
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
        @livewireScripts
    </body>
</html>
