<!-- white buttons -->
@props(['filled' => 'false'])

@if ($filled === true)
    <!-- no border, solid bg -->  
    <x-button type="submit" {{ $attributes->merge(['class' => 'bg-[#4277C1] text-white']) }}>
        {{$slot}}
    </x-button>
@else
    <!-- solid border, transparent bg -->
    <x-button type="submit" {{ $attributes->merge(['class' => 'border border-[#4277C1] text-[#4277C1]']) }}>
        {{$slot}}
    </x-button>
@endif