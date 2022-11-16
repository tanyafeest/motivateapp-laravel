<!-- blue buttons -->
@props(['filled' => 'false', 'icon' => '', 'size' => 'w-full', 'edge' => 'none', 'loc' => 'left'])

@if ($filled === true)
    <!-- no border, solid bg -->  
    <x-button type="submit" {{ $attributes->merge(['class' => 'w-full place-content-center rounded-80 p-5 bg-gradient-to-bl
        from-p-blue3 to-p-blue1 font-bold text-sm uppercase text-white']) }}>
        @if($icon && $loc==='left')
            <img src="/images/{{$icon}}.png" class="mr-2" />
        @endif
        {{$slot}}
        @if($icon && $loc==='right')
            <img src="/images/{{$icon}}.png" class="mr-2" />
        @endif
    </x-button>
@else
    @if ($edge === 'dashed')
        <x-button type="submit" {{ $attributes->merge(['class' => 'w-full place-content-center border-dashed border
            border-p-purple2 rounded-80 p-5 text-p-blue2 font-bold text-sm uppercase flex items-center']) }}>
            @if($icon && $loc==='left')
                <img src="/images/{{$icon}}.png" class="mr-2" />
            @endif
            {{$slot}}
            @if($icon && $loc==='right')
                <img src="/images/{{$icon}}.png" class="ml-2" />
            @endif
        </x-button>
    @else
        <!-- solid border, transparent bg -->
         <x-button type="submit" {{ $attributes->merge(['class' => 'w-full place-content-center border-solid border
            border-p-purple2 rounded-80 p-5 text-p-blue2 font-bold text-sm uppercase']) }}>
            @if($icon && $loc==='left')
                <img src="/images/{{$icon}}.png" class="mr-2" />
            @endif
            {{$slot}}
            @if($icon && $loc==='right')
                <img src="/images/{{$icon}}.png" class="ml-2" />
            @endif
        </x-button>
    @endif
@endif