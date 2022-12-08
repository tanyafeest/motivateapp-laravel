<button {{ $attributes->get('id') }}
    {{ $attributes->thatStartWith('wire:') }}
    {{ $attributes->thatStartWith('x-') }}
    {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'py-2 px-8 rounded-3xl font-medium transition duration-150 ease-in-out' .
    ($attributes->get('disabled') ? ' opacity-75 cursor-not-allowed' : ''),
    ]) }}
    >
    {{ $slot }}
</button>