
<!-- no border, solid bg -->  
<x-button type="submit" {{ $attributes->merge(['class' => 'bg-red-400 text-white']) }} style="background: linear-gradient(0deg, #FD3A84 0%, #FFA68D 100%), #4277C1;">
    {{$slot}}
</x-button>
