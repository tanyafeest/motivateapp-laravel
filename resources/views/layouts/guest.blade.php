<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
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
                <nav aria-label="Sidebar" class="hidden lg:block lg:flex-shrink-0 lg:overflow-y-auto lg:bg-gradient-to-r lg:from-purple-500 lg:to-violet-500">
                    <div class="relative flex w-24 flex-col space-y-3 p-3 justify-items-center space-y-8">
                        <div class="text-white flex-shrink-0 grid space-y-4 items-center justify-center">
                            <img class="w-12 mx-auto" src="images/MotiveMobLogo.svg" />
                            <img class="w-20" src="images/Divide.svg" />
                        </div>
                        
                        <div class="grid space-y-8">
                            <a href="#" class="text-white flex-shrink-0 inline-flex items-center justify-center rounded-lg">
                                <span class="sr-only">Menu</span>
                                <img class="w-6" src="images/menu.svg" />
                            </a>

                            <a href="#" class="text-white flex-shrink-0 inline-flex items-center justify-center rounded-lg">
                                <span class="sr-only">Send</span>
                                <img class="w-6" src="images/Send.svg" />
                            </a>

                            <a href="#" class="text-white flex-shrink-0 inline-flex items-center justify-center rounded-lg">
                                <span class="sr-only">Heart</span>
                                <img class="w-6" src="images/heart.svg" />
                            </a>

                            <a href="#" class="text-white flex-shrink-0 inline-flex items-center justify-center rounded-lg">
                                <span class="sr-only">Gallery</span>
                                <img class="w-6" src="images/Gallery.svg" />
                            </a>

                            <a href="#" class="text-white flex-shrink-0 inline-flex items-center justify-center rounded-lg">
                                <span class="sr-only">Note-3</span>
                                <img class="w-6" src="images/Note-3.svg" />
                            </a>

                            <a href="#" class="text-white flex-shrink-0 inline-flex items-center justify-center rounded-lg">
                                <span class="sr-only">Headphone</span>
                                <img class="w-6" src="images/Headphone.svg" />
                            </a>

                            <a href="#" class="text-white flex-shrink-0 inline-flex items-center justify-center rounded-lg">
                                <span class="sr-only">Dollar</span>
                                <img class="w-6" src="images/dollar.svg" />
                            </a>

                            <a href="#" class="text-white flex-shrink-0 inline-flex items-center justify-center rounded-lg">
                                <span class="sr-only">Setting</span>
                                <img class="w-6" src="images/Setting.svg" />
                            </a>
                        </div>

                        <div>
                            <a href="#" class="text-white flex-shrink-0 inline-flex items-center justify-center rounded-lg">
                                <span class="sr-only">User</span>
                                <img class="w-20" src="images/User.svg" />
                            </a>
                        </div>
                        
                    </div>
                </nav>

                <!-- Main area -->
                <main class="min-w-0 flex-1 border-t border-gray-200 xl:flex">
                    <aside class="">
                        <div class="relative flex h-full w-96 flex-col border-r border-gray-200 bg-gray-100">
                            <div>Motivate</div>
                        </div>
                    </aside>

                    <section aria-labelledby="message-heading" class="flex h-full min-w-0 flex-1 flex-col overflow-hidden">
                        Motive Mob
                    </section>
                </main>
            </div>
        </div>
    </body>
</html>
