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
    <body class="font-sans antialiased h-full overflow-hidden">
         <div class="flex h-full flex-col">
            <div class="flex min-h-0 flex-1 overflow-hidden">
                <!-- Sidebar-->
                <div aria-label="Sidebar" class="hidden lg:pt-8 lg:block lg:flex lg:flex-col lg:h-screen lg:bg-gradient-to-r lg:from-purple-500 lg:to-violet-500 text-white">                 
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

                <!-- Main area -->
                <main class="min-w-0 flex-1 xl:flex text-white">
                    <aside class="bg-sky-300 w-2/5">
                        <div class="relative flex h-full flex-col">
                            <img src="images/topbg.png" alt="" class="absolute top-0 left-0">
                            <div class=" absolute top-48 left-4 text-5xl z-20"><strong>Motivate</strong><br /> to <strong>Be Your <br />Best</strong></div>
                            <img src="images/womanblur.png" alt="" class="absolute bottom-0 right-0 w-[420px]"> 
                        </div>
                    </aside>

                    <section aria-labelledby="message-heading" class="h-full min-w-0 flex-1 overflow-hidden">
                        <div id="" class="overflow-hidden h-screen relative text-gray-800">
                            <div class="bg-sky-50">
                                <div><img class="w-11 h-11 absolute top-8 left-8" src="images/back.svg" alt=""></div>
                                <div>Account Information: Lisa Smith</div>
                                <div class="">
                                    <a href="#" class=" group flex items-center justify-center rounded-lg">
                                        <span class="sr-only">User</span>
                                        <img class="w-20" src="images/User.svg" />
                                    </a>
                                </div>
                            </div>

                            {{$slot}}

                            <div class="bg-sky-50 h-screen">
                                Motivate to be your best
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>