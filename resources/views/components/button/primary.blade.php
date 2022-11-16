<!-- white buttons -->
@props(['filled' => 'false'])

@if ($filled === true)
    <!-- no border, solid bg -->  
    <x-button type="submit" {{ $attributes->merge(['class' => 'bg-white text-blue-500']) }}>
        {{$slot}}
    </x-button>
@else
    <!-- solid border, transparent bg -->
    <x-button type="submit" {{ $attributes->merge(['class' => 'border border-white text-white']) }}>
        {{$slot}}
    </x-button>
@endif