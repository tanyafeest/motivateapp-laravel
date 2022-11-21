<!-- white buttons -->
@props(['filled' => 'false'])

@if ($filled === true)
    <!-- no border, solid bg -->  
    <x-button type="submit" {{ $attributes->merge(['class' => 'bg-blue-500 text-white']) }}>
        {{$slot}}
    </x-button>
@else
    <!-- solid border, transparent bg -->
    <x-button type="submit" {{ $attributes->merge(['class' => 'border border-blue-500 text-blue-500']) }}>
        {{$slot}}
    </x-button>
@endif