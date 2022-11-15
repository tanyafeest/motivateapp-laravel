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
                    <aside class="bg-cyan-300 w-2/5">
                        <div class="relative flex h-full flex-col">
                            <img src="images/topbg.png" alt="" class="absolute top-0 left-0">
                            <div class=" absolute top-48 left-4 text-5xl z-20"><strong>Motivate</strong><br /> to <strong>Be Your <br />Best</strong></div>
                            <img src="images/womanblur.png" alt="" class="absolute bottom-0 right-0 w-[420px]"> 
                        </div>
                    </aside>

                    <section aria-labelledby="message-heading" class="h-full min-w-0 flex-1 overflow-hidden">
                        <div id="step-2" class="hidden grid overflow-hidden grid-cols-2 grid-rows-3 gap-0 h-screen">
                            <div class="bg-red-100 col-start-1 col-span-2">
                                 Motive Mob
                            </div>
                            <div class="bg-pink-300 relative flex justify-center">
                                <img class="absolute bottom-0 w-80" src="images/woman4.png" alt="">
                            </div>
                            <div class="bg-yellow-300 relative flex justify-center">
                                <img class="absolute bottom-0 w-80" src="images/woman1.png" alt="">
                            </div>
                            <div class="bg-pink-400 relative py-4 px-8 text-sm"> 
                                <div>
                                    <p class="text-justify">Let your team, friends, and family support your sports success. Have them join your "Mob" to provide you with inspiration through song and word! Use this free app to get motivation from people that care about you. Here's how it works:</p>
                                </div>
                                <div class="absolute bottom-4 left-8">Skip</div>
                            </div>
                            <div class="bg-yellow-400 relative py-4 px-8 text-sm">
                                <div>
                                    <p class="text-justify">Let your team, friends, and family support your sports success. Have them join your "Mob" to provide you with inspiration through song and word! Use this free app to get motivation from people that care about you. Here's how it works:</p>
                                </div>
                                <div class="absolute bottom-4 right-20">Back</div>
                                <div class="absolute bottom-4 right-8">Next</div>
                            </div>
                        </div>
                        <div id="step-2" class="hidden grid overflow-hidden grid-cols-2 grid-rows-3 gap-0 h-screen">
                            <div class="bg-red-100 col-start-1 col-span-2">
                                 Motive Mob
                            </div>
                            <div class="bg-yellow-300 relative flex justify-center">
                                <img class="absolute bottom-0 w-80" src="images/woman1.png" alt="">
                            </div>
                            <div class="bg-green-300 relative flex justify-center">
                                <img class="absolute bottom-0 w-80" src="images/woman2.png" alt="">
                            </div>
                            <div class="bg-yellow-400 relative py-4 px-8 text-sm"> 
                                <div>
                                    <p class="text-justify">Let your team, friends, and family support your sports success. Have them join your "Mob" to provide you with inspiration through song and word! Use this free app to get motivation from people that care about you. Here's how it works:</p>
                                </div>
                                <div class="absolute bottom-4 left-8">Skip</div>
                            </div>
                            <div class="bg-green-400 relative py-4 px-8 text-sm">
                                <div>
                                    <p class="text-justify">Select your types of motivation - music-based and inspiring quotes. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. </p>
                                </div>
                                <div class="absolute bottom-4 right-20">Back</div>
                                <div class="absolute bottom-4 right-8">Next</div>
                            </div>
                        </div>
                        <div id="step-3" class="hidden grid overflow-hidden grid-cols-2 grid-rows-3 gap-0 h-screen">
                            <div class="bg-red-100 col-start-1 col-span-2">
                                 Motive Mob
                            </div>
                            <div class="bg-green-300 relative flex justify-center">
                                <img class="absolute bottom-0 w-80" src="images/woman2.png" alt="">
                            </div>
                            <div class="bg-blue-300 relative flex justify-center">
                                <img class="absolute bottom-0 w-80" src="images/woman3.png" alt="">
                            </div>
                            <div class="bg-green-400 py-4 px-8 text-sm"> 
                                <div>
                                    <p class="text-justify">Select your types of motivation - music-based and inspiring quotes. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. </p>
                                </div>
                                <div class="absolute bottom-4 left-8">Skip</div>
                            </div>
                            <div class="bg-blue-400 py-4 px-8 text-sm">
                                <div>
                                    <p class="text-justify">Receive weekly text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. Nulla lacus libero, varius et eros sed, convallis viverra enim. </p>
                                </div>
                                <div class="absolute bottom-4 right-8">Next</div>
                            </div>
                        </div>
                        <div id="step-4" class=" grid overflow-hidden grid-cols-1 grid-rows-4 gap-0 h-screen">
                            <div class="col-start-1 col-span-1" style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), #D9D9D9;">
                                 Motive Mob
                            </div>
                            <div class="bg-purple-300 row-span-2 relative flex justify-center">
                            </div>
                            <div class="bg-purple-600 py-4 px-8 relative text-sm"> 
                                <div class="grid grid-cols-2 gap-8">
                                    <div>
                                        <p class="text-justify">View your <strong>private inspiration page</strong> like this one. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <x-button isFilled>Register Free Account</x-button>
                                        <p class="text-xs text-center mt-2">Your account is free (forever). You can upgrade for $20/year for additional premium features.
                                    </div>
                                </div>
                                
                                <div class="absolute bottom-4 left-8">Skip</div>
                                <div class="absolute bottom-4 right-8">Back</div>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </body>
</html>
