
<!-- no border, solid bg -->  
<x-button type="submit" {{ $attributes->merge(['class' => 'bg-white text-red-400']) }}>
    {{$slot}}
</x-button>
