
<!-- no border, solid bg -->  
<x-button type="submit" {{ $attributes->merge(['class' => 'bg-white text-blue-400']) }}>
    {{$slot}}
</x-button>
