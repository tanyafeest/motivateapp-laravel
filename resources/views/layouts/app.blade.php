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
    <body class="">
         <div class="grid overflow-hidden grid-lines auto-cols-fr grid-rows-12 gap-0 h-screen">
            <div class="row-start-1 row-end-5 col-start-1 col-end-5 grid overflow-hidden grid-lines auto-cols-fr grid-rows-1 gap-0 h-screen">
                <!-- Sidebar-->
                <div class="col-start-1 col-end-3 lg:bg-gradient-to-r lg:from-purple-500 lg:to-violet-500 hidden lg:pt-8 lg:block lg:flex lg:flex-col lg:h-screen text-white">                 
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

                <!-- Into -->
                <div class="col-start-3 col-end-12" style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), #83DBEE;">
                    
                </div>
            </div>
                 
            <!-- Main area -->
            <div class="row-start-1 row-end-2 col-start-5 col-end-12 bg-sky-50 relative">
                <div><img class="w-11 h-11 absolute top-8 left-8" src="images/back.svg" alt=""></div>
                <div>Account Information: Lisa Smith</div>
                <div class="">
                    <a href="#" class=" group flex items-center justify-center rounded-lg">
                        <span class="sr-only">User</span>
                        <img class="w-20" src="images/User.svg" />
                    </a>
                </div>
            </div>

            <div class="row-start-2 row-end-4 col-start-5 col-end-12">
                {{$slot}}
            </div>

            <div class="row-start-4 row-end-12 col-start-5 col-end-12 bg-sky-300">
                
                Motivate to be your best
            </div>
                
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>