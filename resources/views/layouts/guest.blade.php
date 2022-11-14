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
    <body class="h-full overflow-hidden">
        <div class="flex h-full flex-col">
            <div class="flex min-h-0 flex-1 overflow-hidden">
                <!-- Sidebar-->
                <div aria-label="Sidebar" class="hidden lg:pt-8 lg:block lg:flex-shrink-0 lg:overflow-y-auto lg:bg-gradient-to-r lg:from-purple-500 lg:to-violet-500">
                    <div class="w-24 flex min-h-0 flex-1 flex-col">
                        <div class="text-white flex flex-1 flex-col overflow-y-auto">
                            <img class="w-12 mx-auto" src="images/MotiveMobLogo.svg" />
                            <img class="w-20" src="images/Divide.svg" />
                        </div>
                        
                        <nav class=" flex-1 space-y-8">
                            <a href="#" class="text-white group flex items-center justify-center rounded-lg">
                                <span class="sr-only">Menu</span>
                                <img class="w-6" src="images/menu.svg" />
                            </a>

                            <a href="#" class="text-white group flex items-center justify-center rounded-lg">
                                <span class="sr-only">Send</span>
                                <img class="w-6" src="images/Send.svg" />
                            </a>

                            <a href="#" class="text-white group flex items-center justify-center rounded-lg">
                                <span class="sr-only">Heart</span>
                                <img class="w-6" src="images/heart.svg" />
                            </a>

                            <a href="#" class="text-white group flex items-center justify-center rounded-lg">
                                <span class="sr-only">Gallery</span>
                                <img class="w-6" src="images/Gallery.svg" />
                            </a>

                            <a href="#" class="text-white group flex items-center justify-center rounded-lg">
                                <span class="sr-only">Note-3</span>
                                <img class="w-6" src="images/Note-3.svg" />
                            </a>

                            <a href="#" class="text-white group flex items-center justify-center rounded-lg">
                                <span class="sr-only">Headphone</span>
                                <img class="w-6" src="images/Headphone.svg" />
                            </a>

                            <a href="#" class="text-white group flex items-center justify-center rounded-lg">
                                <span class="sr-only">Dollar</span>
                                <img class="w-6" src="images/dollar.svg" />
                            </a>

                            <a href="#" class="text-white group flex items-center justify-center rounded-lg">
                                <span class="sr-only">Setting</span>
                                <img class="w-6" src="images/Setting.svg" />
                            </a>
                        </nav>

                        <div class="flex flex-shrink-0">
                            <a href="#" class="text-white group flex items-center justify-center rounded-lg">
                                <span class="sr-only">User</span>
                                <img class="w-20" src="images/User.svg" />
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Main area -->
                <main class="min-w-0 flex-1 xl:flex">
                    <aside class="bg-cyan-300 w-2/5">
                        <div class="relative flex h-full flex-col">
                            <img src="images/topbg.png" alt="" class="absolute top-0 left-0">
                            <div class="text-white absolute top-48 left-4 text-5xl z-20"><strong>Motivate</strong><br /> to <strong>Be Your <br />Best</strong></div>
                            <img src="images/womanblur.png" alt="" class="absolute bottom-0 right-0 w-[420px]">
                            
                        </div>
                    </aside>

                    <section aria-labelledby="message-heading" class="h-full min-w-0 flex-1 overflow-hidden">
                        <div id="step-1" class="hidden grid overflow-hidden grid-cols-2 grid-rows-3 gap-0 h-screen">
                            <div class="bg-red-100 col-start-1 col-span-2">
                                 Motive Mob
                            </div>
                            <div class="bg-yellow-300 relative flex justify-center">
                                <img class="absolute bottom-0 w-80" src="images/woman1.png" alt="">
                            </div>
                            <div class="bg-green-300 relative flex justify-center">
                                <img class="absolute bottom-0 w-80" src="images/woman2.png" alt="">
                            </div>
                            <div class="bg-yellow-400 p-4 text-white text-sm"> 
                                <p class="text-justify">Let your team, friends, and family support your sports success. Have them join your "Mob" to provide you with inspiration through song and word! Use this free app to get motivation from people that care about you. Here's how it works:</p>
                                <div class="absolute bottom-4">Skip</div>
                            </div>
                            <div class="bg-green-400 p-4 text-white text-sm">
                                <p class="text-justify">Select your types of motivation - music-based and inspiring quotes. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. </p>
                                <div class="absolute bottom-4">Next</div>
                            </div>
                        </div>
                        <div id="step-2" class="grid overflow-hidden grid-cols-2 grid-rows-3 gap-0 h-screen">
                            <div class="bg-red-100 col-start-1 col-span-2">
                                 Motive Mob
                            </div>
                            <div class="bg-green-300 relative flex justify-center">
                                <img class="absolute bottom-0 w-80" src="images/woman2.png" alt="">
                            </div>
                            <div class="bg-blue-300 relative flex justify-center">
                                <img class="absolute bottom-0 w-80" src="images/woman3.png" alt="">
                            </div>
                            <div class="bg-green-400 p-4 text-white text-sm"> 
                               <p class="text-justify">Select your types of motivation - music-based and inspiring quotes. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. </p>
                                <div class="absolute bottom-4">Next</div>
                            </div>
                            <div class="bg-blue-400 p-4 text-white text-sm">
                                <p class="text-justify">Receive weekly text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. Nulla lacus libero, varius et eros sed, convallis viverra enim. </p>
                                <div class="absolute bottom-4">Next</div>
                            </div>
                        </div>
                        <div id="step-2" class="hidden grid overflow-hidden grid-cols-2 grid-rows-3 gap-0 h-screen">
                            <div class="bg-red-100 col-start-1 col-span-2">
                                 Motive Mob
                            </div>
                            <div class="bg-red-300 relative flex justify-center">
                                <img class="absolute bottom-0 w-80" src="images/woman2.png" alt="">
                            </div>
                            <div class="bg-green-300 relative flex justify-center">
                                <img class="absolute bottom-0 w-80" src="images/woman2.png" alt="">
                            </div>
                            <div class="bg-red-400 p-4 text-white text-sm"> 
                               p class="text-justify">Select your types of motivation - music-based and inspiring quotes. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. </p>
                                <div class="absolute bottom-4">Next</div>
                            </div>
                            <div class="bg-green-400 p-4 text-white text-sm">
                                <p class="text-justify">Select your types of motivation - music-based and inspiring quotes. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. </p>
                                <div class="absolute bottom-4">Next</div>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </body>
</html>
