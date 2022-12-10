<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://js.stripe.com/v3/"></script>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="h-screen font-sans antialiased bg-neutral-100">
        <div class="grid h-screen gap-0 overflow-hidden" style="grid-template-columns: 80px 500px 1fr;">
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
            @if (Cookie::get("isVisited") == null)
                {{ Cookie::queue("isVisited", "true", 2628000); }}
            @endif

            <div class="relative flex items-center justify-center" style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), #83DBEE;">
                <img class="absolute right-0" src="images/ribbon.svg" alt="">
                @if (!Cookie::get("isVisited"))
                <div class="z-20 p-4 m-8 space-y-2 text-white rounded-lg bg-red-500/40">
                    <h2 class="mb-4 text-xl font-semibold">Congratulations!</h2>
                    <p>You just created your program to begin getting motivated! We`ll shortly send you a confirmation text to receive your personalized motivation. </p>
                    <p>To get started now, review your dashboard below and invite others to give a quote and song to help inspire! </p>
                </div>
                @endif
            </div>

            <!-- Main area -->
            <div class="grid grid-cols-1 gap-0 overflow-hidden grid-rows-8">
                <div class="relative flex items-center justify-between row-start-1 row-end-2 bg-sky-50">
                    <div>
                        <img class="absolute w-11 h-11 top-4 left-4" src="images/back-arrow.png" alt="">
                    </div>
                    <div class="text-center">
                        <p>Account Information:</p>
                        <p class="font-semibold">{{ Auth::user()->name }}</p>
                    </div>
                    <div class="">
                        <a href="#" class="flex items-center justify-center rounded-lg group">
                            <span class="sr-only">User</span>
                            <img class="w-20" src="images/User.svg" />
                        </a>
                    </div>
                </div>

                {{$slot}}
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>