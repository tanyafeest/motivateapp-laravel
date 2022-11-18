<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Upgrade') }}
        </h2>
    </x-slot>
    
    {{-- upgrade --}}
    <livewire:upgrade />
</x-app-layout>