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
        <div class="h-screen lg:grid lg:overflow-hidden lg:gap-0" style="grid-template-columns: 80px 460px 1fr;">
            <!-- Sidebar-->
            @livewire('sidebar')

            <!-- Intro -->
            @livewire('intro', ['layout' => 'guest'])

            <!-- Main area -->
            <div class="text-white">
                {{$slot}}
            </div>
        </div>
        
        @stack('modals')

        @livewireScripts
    </body>
</html>