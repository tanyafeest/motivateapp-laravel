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
        <div class="lg:grid lg:overflow-hidden lg:gap-0 h-screen" style="grid-template-columns: 80px 500px 1fr;">
            <!-- Sidebar: hidden on mb -->
            @livewire('sidebar')

            <!-- Intro: hidden on mb -->
            @if(Request::is('inspiration'))
                <x-intro-blue />
            @elseif(Request::is('inspiration-playlist'))
                @livewire('album')
            @else
                @livewire('intro')
            @endif
                 
            <!-- Main area -->
            <div id="main" class="flex flex-col h-screen">     
                {{$slot}}

                <!-- Footer menu: mb only -->
                <div class="fixed bottom-0 left-0 z-20 w-full px-8 mt-20 rounded-lg shadow-lg lg:hidden -py-4 bg-gray-50">
                    <div class="flex items-center justify-between text-2xl text-zinc-400">
                        <a href="/dashboard"><img src="images/menu-home.svg" alt=""></a>
                        <a href="/"><img src="images/menu-share.svg" alt=""></a>
                        <a href="/inspiration"><img src="images/menu-main.svg" alt=""></a>
                        <a href="/upgrade-plan"><img src="images/menu-upgrade.svg" alt=""></a>
                        <a href="/settings"><img src="images/menu-settings.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>