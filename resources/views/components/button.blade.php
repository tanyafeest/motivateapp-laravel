<button 
    {{ $attributes->get('id') }}
    {{ $attributes->thatStartWith('wire:') }}
    {{ $attributes->thatStartWith('x-') }}
    {{ $attributes->class(['py-2 px-8 text-blue-500 rounded-full font-medium transition duration-150 ease-in-out', 'bg-white' => $isFilled])->merge(['type' => 'button']) }}

    >
    {{ $slot }}
</button>