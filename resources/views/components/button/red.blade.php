
<!-- no border, solid bg -->  
<x-button type="submit" {{ $attributes->merge(['class' => 'bg-red-400 text-white']) }}>
    {{$slot}}
</x-button>
